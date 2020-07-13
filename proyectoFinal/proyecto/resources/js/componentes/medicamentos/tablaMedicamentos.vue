<template>
    <!--contenido principal-->
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <!--            <li class="breadcrumb-item">Home</li>-->
            <!--            <li class="breadcrumb-item"><a href="#">Admin</a></li>-->
            <!--            <li class="breadcrumb-item active">Dashboard</li>-->
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                   
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalMedicamento">
                        <i class="fa fa-plus-circle"></i>&nbsp;  <b>Agregar </b>
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Presentacion</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="medicamento in medicamentos" :key="medicamento.id">
                          
                            <td>
                                <!--editar-->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modalMedicamento" @click="cargarMedicamento(medicamento)">
                                    <i class="icon-pencil"></i>
                                </button>

                                <!--eliminar-->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modalEliminar">
                                    <i class="icon-trash"></i>
                                </button>

                                <!--modal para eliminar-->
                                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-danger" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Eliminar medicamento</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <a id="valor"></a>
                                            <div class="modal-body">
                                                <p>¿Estas seguro de eliminar el registro de medicamento?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cerrar
                                                </button>
                                                <button type="button" class="btn btn-danger"
                                                        @click="deleteMedicamento(medicamento.id)" data-dismiss="modal">Eliminar
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </td>
                            <!--valores de la tabla-->
                            <td v-text="medicamento.nombre"></td>
                            <td v-text="medicamento.descripcion"></td>
                            <td v-text="medicamento.presentacion"></td>
                            <td v-text="medicamento.precio"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>

        <!--modal para agregar y actualizar registros-->
        <div class="modal fade" id="modalMedicamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar medicamento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                @click="clearFields('#modalMedicamento')">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="form-horizontal" data-parsley-validate>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nombre</label>
                                <div class="col-md-9">
                                    <input v-model="nombre" type="text" id="nombre" name="nombre" class="form-control"
                                           placeholder="Nombre de medicamento">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Descripcion</label>
                                <div class="col-md-9">
                                    <input v-model="cantidad" type="text" id="descripcion" name="descripcion"
                                           class="form-control"
                                           placeholder="Ingrese una descripcion">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Presentacion</label>
                                <div class="col-md-9">
                                    <input v-model="cantidad" type="text" id="presentacion" name="presentacion"
                                           class="form-control"
                                           placeholder="Ingrese la presentacion">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Prcio</label>
                                <div class="col-md-9">
                                    <input v-model="cantidad" type="text" id="precio" name="precio"
                                           class="form-control"
                                           placeholder="Ingrese el precio">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="clearFields('#modalMedicamento')">Cerrar
                        </button>
                        <button type="button" v-if="update == 0" class="btn btn-primary" @click="addMedicamento()">
                            Guardar
                        </button>
                        <button type="button" v-if="update != 0" class="btn btn-primary" @click="updateMedicamento()">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </main>
</template>

<!--funciones de los botones-->
<script>
//se inicializan las variables
    export default {
        data() {
            return {
                nombre: "",
                descripcion: "",
                presentacion: "",
                precio: "",
               
                 update: 0,
                medicamentos: []
            }
        },
        //se obtienen los resultados de las tablas
        methods: {
            getMedicamentos() {
                let me = this;
                let url = '/medicamentos/obtenerMedicamentos';
                axios.get(url).then(function (response) {
                    me.medicamentos = response.data;
                    console.log(me.medicamentos);
                }).catch(function (error) {
                    console.log(error);
                });
            },
            //se elimina el medicamento
            deleteMedicamento(id) {
                let me = this;
                let url = '/medicamentos/eliminarMedicamento/' + id;
                axios.delete(url).then(function (response) {
                    me.getMedicamentos();
                    $('modalEliminar').modal('hide');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            //se agrega el registro del medicamento
            addMedicamento() {
                let me = this;
                let url = '/medicamentos/agregarMedicamento';
                axios.post(url, { 
                    'nombre': this.nombre,
                    'descripcion': this.descripcion,
                    'presentacion': this.presentacion,
                    'precio': this.precio,
                   
                }).then(function (response) {
                    me.getMedicamentos();   
                    me.clearFields('#modalMedicamento'); 
                }).catch(function (error) {
                    console.log(error);
                });
            },
            //se actualiza el registro del medicamento
            updateMedicamento() {
                let me = this;
                let url = '/medicamentos/editarMedicamento';
                axios.patch(url, { 
                    'id': this.update,
                    'nombre': this.nombre,
                    'descripcion': this.descripcion,
                    'presentacion': this.presentacion,
                    'precio': this.precio,
                    
                 
                }).then(function (response) {
                    me.getMedicamentos();    
                    me.clearFields('#modalMedicamento');  
                }).catch(function (error) {
                    console.log(error);
                });
            },
            //se busca el medicamento
            cargarMedicamento(data) { 
                this.update = data.id
                let me = this;
                let url = '/medicamentos/buscarMedicamento/' + this.update;
                axios.get(url).then(function (response) {
                    me.nombre = response.data.nombre;
                    me.descripcion = response.data.descripcion;
                    me.presentacion = response.data.presentacion;
                    me.precio = response.data.precio;
                   
             
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            clearFields(modal) {
                this.nombre = "";
                this.descripcion = "";
                this.presentacion = "";
                this.precio = "";
               
                this.update = 0;
                $(modal).modal('hide');
            },
        },
        mounted() {
            this.getMedicamentos();
        }
    }
</script>
