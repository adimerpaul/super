<template>
    <div >
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="">Super</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas  fa-shopping-cart"></i> <span v-if="prodselecionados.length!=0" class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Productos</div>
                                    <div class="notification-list">
                                        <div class="list-group" style="width: 250px">
                                            <button class="list-group-item list-group-item-action" v-for="selec in prodselecionados">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img width="128" v-bind:src="'img/'+selec.id+'.jpg'"class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">{{selec.nombre}}</span><br>
                                                        {{selec.precio1}}
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer">  <a @click="vercarrito" >Ver carrito {{total}}</a></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item" v-for="item in categorias">
                                <a @click="prod(item)" class="nav-link"><i v-bind:class="item.icono"></i>{{item.nombre}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" @click="combos"  ><i class="fas fa-fw fa-table"></i>Combos</a>
                            </li>
                            <li @click="vercarrito" class="list-group-item d-flex justify-content-between align-items-center">
                                <i class="fas fa-fw fa-shopping-cart"></i> Ver Carrito
                                <span class="badge badge-primary badge-pill">{{prodselecionados.length}}</span>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Categoria: {{titulocategoria}} </h2>
<!--                                <p class="pageheader-text">puede seleccionar un producto de nuestro menu para agregar al carrito y cuando finalise nos pondremos en contacto con usted </p>-->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
<!--                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">E-coommerce</a></li>-->
                                            <li class="breadcrumb-item active" aria-current="page">Puede seleccionar un producto de nuestro menu para agregar al carrito y cuando finalise nos pondremos en contacto con usted</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12" v-for="item in productos">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img v-if="!iscomobo" v-bind:src="'img/'+item.id+'.jpg'"  alt="" class="img-fluid">
                                                <img v-else="" v-bind:src="'img/combos/'+item.id+'.jpg'"  alt="" class="img-fluid">
                                            </div>
                                            <div v-if="item.estado!=''" class="ribbons " v-bind:class="item.estado=='Sold'?'bg-danger':item.estado=='Offer'?'bg-brand':''"></div>
                                            <div class="ribbons-text" >{{item.estado}}</div>
                                            <div class=""><a class="product-wishlist-btn" v-bind:class="item.corazon=='SI'?'active':''"><i class="fas fa-heart"  v-bind:style="{color:item.corazon=='SI'?'#FF3367':'#DDDCEA'}"></i></a></div>
                                        </div>
                                        <div class="product-content" >
                                            <div class="product-content-head">
                                                <h3 class="product-title">{{item.nombre}}</h3>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star" v-for="index in parseInt(item.estrella) " :key="index"></i>
                                                </div>
                                                <div class="product-price" >
                                                    {{item.precio1}} Bs
                                                    <del v-if="item.precio2!=''" class="product-del">{{item.precio2}} Bs</del>
                                                </div>
                                            </div>
                                            <div class="product-btn" style="text-align: center">
                                                <a  @click="agregarcarrito(item)" class="btn btn-success text-white"><i class="fas fa-fw fa-shopping-cart"></i> Agregar carrito</a>
<!--                                                <a href="#" class="btn btn-outline-light">Details</a>-->
<!--                                                <a href="#" class="btn btn-outline-light"><i class="fas fa-exchange-alt"></i></a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="vercarrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header p-1  m-0">
                        <h5 class="modal-title"  id="exampleModalLabel">Mi Carrito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <small>El costo de envió es dependiendo del lugar de su dirección un operario un
                                    <strong>operario se comunicara con usted por <a href="https://web.whatsapp.com/"> <i class="fab fa-whatsapp"></i> whatsapp</a></strong></small>
                                <br>
<!--                                <small>Si tiene dudas o consultas puede comunicarse con el numero  <a href=""> <i class="fab fa-whatsapp"></i> 69603027</a></small>-->
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="from-group">
                                <h5 class="text-center mt-1"> Mis Productos</h5>
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cancelar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in prodselecionados" :key="index">
                                        <th scope="row">{{index+1}}</th>
                                        <td>{{item.nombre}}</td>
                                        <td>{{item.precio1}} Bs.</td>
                                        <td><button type="button" @click="eliminar(index)" class="btn btn-danger p-1"><i class="fa fa-trash"></i> Quitar</button></td>
                                    </tr>
                                    </tbody>
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Total</th>
                                        <th scope="col">{{total}} Bs.</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="form-row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" type="text"  class="form-control form-control-sm" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="celular">Celular</label>
                                    <input id="celular" type="number" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="from-group">
                                <label for="direccion">Direccion</label>
                                <input id="direccion" type="text" class="form-control form-control-sm" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal"> <i class="fa fa-eye"></i> Ocultar</button>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle"></i> Realizar Pedido</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="selectcombo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header p-1  m-0">
                        <h5 class="modal-title"  id="selecion">Mi Carrito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <small>El costo de envió es dependiendo del lugar de su dirección un operario un
                                    <strong>operario se comunicara con usted por <a href="https://web.whatsapp.com/"> <i class="fab fa-whatsapp"></i> whatsapp</a></strong></small>
                                <br>
                                <!--                                <small>Si tiene dudas o consultas puede comunicarse con el numero  <a href=""> <i class="fab fa-whatsapp"></i> 69603027</a></small>-->
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="from-group">
                                <h5 class="text-center mt-1"> Mis Productos</h5>
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cancelar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in prodselecionados" :key="index">
                                        <th scope="row">{{index+1}}</th>
                                        <td>{{item.nombre}}</td>
                                        <td>{{item.precio1}} Bs.</td>
                                        <td><button type="button" @click="eliminar(index)" class="btn btn-danger p-1"><i class="fa fa-trash"></i> Quitar</button></td>
                                    </tr>
                                    </tbody>
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Total</th>
                                        <th scope="col">{{total}} Bs.</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
<!--                            <div class="form-row">-->
<!--                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">-->
<!--                                    <label for="nombre">Nombre</label>-->
<!--                                    <input id="nombre" type="text"  class="form-control form-control-sm" required>-->
<!--                                </div>-->
<!--                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">-->
<!--                                    <label for="celular">Celular</label>-->
<!--                                    <input id="celular" type="number" class="form-control form-control-sm" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="from-group">-->
<!--                                <label for="direccion">Direccion</label>-->
<!--                                <input id="direccion" type="text" class="form-control form-control-sm" required>-->
<!--                            </div>-->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal"> <i class="fa fa-eye"></i> Ocultar</button>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle"></i> Realizar Pedido</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery';
    export default {
        data(){
          return{
              categorias:[],
              productos:[],
              prodselecionados:[],
              titulocategoria:'',
              iconocategoria:'',
              iscomobo:false,
          }
        },
        created() {
            this.datcategorias();
            this.prod(
                {icono: "fas fa-book",
                id: 1,
                nombre: "Pizzass"}
                );
        },
        methods:{
            datcategorias(){
                axios.get('categoria').then(res=>{
                   this.categorias=res.data;
                });
            },
            combos(){
                this.iscomobo=true;
                this.productos=[];
                this.titulocategoria='Combos';
                // this.iccategoria=item.icono;
                axios.get('combo').then(res=>{
                    this.productos=res.data;
                })
            },
            prod(item){
                this.iscomobo=false;
                // console.log(item);
                this.productos=[];
                this.titulocategoria=item.nombre;
                // this.iccategoria=item.icono;
                axios.get('producto/'+item.id).then(res=>{
                    this.productos=res.data;
                })
            },
            agregarcarrito(item){
                console.log(this.combos);
                // if (!this.combos){
                    this.prodselecionados.push(item);
                    this.$toastr.s("Agregado al carrito");
                // }else{
                //     $('#selectcombo').modal('show');
                // }
            },
            vercarrito(){
                $('#vercarrito').modal('show');
            },
            eliminar(index){
                this.prodselecionados.splice(index, 1);
            }
        },
        mounted() {
            // console.log('Component mounted.')
            this.$toastr.defaultPosition = "toast-top-left";
            // this.$fire({
            //     title: "Title",
            //     text: "text",
            //     type: "success",
            //     timer: 3000
            // }).then(r => {
            //     console.log(r.value);
            // });
        },
        computed: {
            total: function () {
                var sum = 0;
                this.prodselecionados.forEach(e => {
                    sum += parseFloat(e.precio1) ;
                });
                return sum.toFixed(2);
            }
        }
    }
</script>
