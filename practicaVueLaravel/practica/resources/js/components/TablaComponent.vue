<template>
<div>
    <!--tabla de los productos-->
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Productos
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </button>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control col-md-3" id="opcion" name="opcion">
                        <option value="nombre">Nombre</option>
                        <option value="descripcion">Descripción</option>
                        </select>
                        <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Opciones</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <!--se hace uso de un arreglo y del id de cada producto-->
                    <tr v-for="producto in arregloProductos" :key="producto.id">
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                            <i class="icon-pencil"></i>
                            </button>&nbsp;
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">
                            <i class="icon-trash"></i>
                            </button>
                        </td>
                        <!--se muestran las propiedades de los productos-->
                        <td v-text="producto.nombre"></td>
                        <td v-text="producto.descripcion"></td>
                        <td>
                            <span class="badge badge-success">Activo</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">Ant</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Sig</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

    <!--modal para agregar un producto nuevo-->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--se piden los datos del producto-->
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                        <div class="col-md-9">
                            <input v-model="nombre" type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del producto">
                            <span class="help-block">(*) Ingrese el nombre del producto</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                        <div class="col-md-9">
                            <input v-model="descripcion" type="email" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion del producto">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!--boton para cerrar el modal-->
                <button id="modalCerrar" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <!--boton para guardar el producto-->
                <button @click="guardarProductos()" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!--Aqui se termina el modal-->
    </div>
    </div>
</div>

</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.obtenerProductos();
        },
        data(){
            return{
                nombre:'',
                descripcion:'',
                estado:'',
                arregloProductos:[],
            }
        },
        methods:{
            //funcion que obtiene los productos mediante axios
            obtenerProductos(){
                let me = this;
                //Ruta del controlador
                let url = '/1730055-TAW-42/practicaVueLaravel/practica/public/productos';
                axios.get(url).then(function(response){
                    me.arregloProductos = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
            },
            guardarProductos(){
                let me = this;
                //ruta del controller
                let url = '/1730055-TAW-42/practicaVueLaravel/practica/public/productos';
                axios.post(url,{ 
                    //aqui se trae las propiedades
                    'nombre':this.nombre,
                    'descripcion':this.descripcion,
                }).then(function (response) {
                    //se refrescan los datos
                    me.obtenerProductos();
                    //se limpian los campos
                    me.limpia();
                    //se cierra el modal
                    document.getElementById('modalCerrar').click();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            limpia(){
                this.nombre = "";
                this.descripcion = "";
                this.update = 0;
            }
        }
    }
</script>