<template>
    <!-- Contenido Principal -->
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <!--            <li class="breadcrumb-item">Home</li>-->
            <!--            <li class="breadcrumb-item"><a href="#">Admin</a></li>-->
            <!--            <li class="breadcrumb-item active">Dashboard</li>-->
        </ol>
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                <div class="card-header">
                   
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEnfermedad">
                        <i class="fa fa-plus-circle"></i>&nbsp;  <b>Agregar </b>
                    </button>


                  
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                             <th>Acciones</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                           
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="enfermedad in enfermedades" :key="enfermedad.id">
                          
                            <td>
                                <!-- EDITAR -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modalEnfermedad" @click="cargarEnfermedad(enfermedad)">
                                    <i class="icon-pencil"></i>
                                </button>

                                <!--ELIMINAR -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modalEliminar">
                                    <i class="icon-trash"></i>
                                </button>

                                <!-- MODAL DE ELIMINAR  -->
                                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-danger" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Eliminar enfermedad</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <a id="valor"></a>
                                            <div class="modal-body">
                                                <p>¿Estas seguro de eliminar el enfermedad?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cerrar
                                                </button>
                                                <button type="button" class="btn btn-danger"
                                                        @click="deleteEnfermedad(enfermedad.id)" data-dismiss="modal">Eliminar
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </td>
                            <!-------- VALORES DE LA TABLA-------->
                            <td v-text="enfermedad.nombre"></td>
                            <td v-text="enfermedad.descripcion"></td>
                           


                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>


        <!--MODAL PARA AGREGAR Y ACTUALIZAR-->
        <div class="modal fade" id="modalEnfermedad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar enfermedad</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                @click="clearFields('#modalEnfermedad')">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="form-horizontal" data-parsley-validate>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nombre</label>
                                <div class="col-md-9">
                                    <input v-model="nombre" type="text" id="nombre" name="nombre" class="form-control"
                                           placeholder="Nombre de enfermedad">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">descripcion</label>
                                <div class="col-md-9">
                                    <input v-model="descripcion" type="text" id="descripcion" name="descripcion"
                                           class="form-control"
                                           placeholder="Ingrese descripcion">
                                </div>
                            </div>



                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="clearFields('#modalEnfermedad')">Cerrar
                        </button>
                        <button type="button" v-if="update == 0" class="btn btn-primary" @click="addEnfermedad()">
                            Guardar
                        </button>
                        <button type="button" v-if="update != 0" class="btn btn-primary" @click="updateEnfermedad()">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!------- FINAL DEL MODAL-------------------->

    </main>
</template>


<!-------------------- FUNCIONES DE LOS BOTONES------------>
<script>

/////////////////////// Se inicializan variables
    export default {
        data() {
            return {
                nombre: "",
                descripcion: "",
               
                 update: 0,
                enfermedades: []
            }
        },
        ////////////////////////// Se obtienen los resultados de la tabla
        methods: {
            getEnfermedads() {
                let me = this;
                let url = '/enfermedades/obtenerEnfermedades';
                axios.get(url).then(function (response) {
                    me.enfermedades = response.data;
                    console.log(me.enfermedades);
                }).catch(function (error) {
                    console.log(error);
                });
            },
            ////////////////////////// Se elimina el enfermedad seleccionado
            deleteEnfermedad(id) {
                let me = this;
                let url = '/enfermedades/eliminarEnfermedad/' + id;
                axios.delete(url).then(function (response) {
                    me.getEnfermedads();
                    $('modalEliminar').modal('hide');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            ///////////////////// CREA EL REGISTRO DEL enfermedad
            addEnfermedad() {
                let me = this;
                let url = '/enfermedades/agregarEnfermedad';
                axios.post(url, { 
                    'nombre': this.nombre,
                    'descripcion': this.descripcion,
                   
                }).then(function (response) {
                    me.getEnfermedads();   
                    me.clearFields('#modalEnfermedad'); 
                }).catch(function (error) {
                    console.log(error);
                });
            },
            ///////////////////// ACTUALIZA EL REGISTRO DEL Enfermedad
            updateEnfermedad() {
                let me = this;
                let url = '/enfermedades/editarEnfermedad';
                axios.patch(url, { 
                    'id': this.update,
                    'nombre': this.nombre,
                    'descripcion': this.descripcion,
                    
                 
                }).then(function (response) {
                    me.getEnfermedads();    
                    me.clearFields('#modalEnfermedad');  
                }).catch(function (error) {
                    console.log(error);
                });
            },
            //////////////////////7 SE BUSCA EL Enfermedad SELECCIONADO
            cargarEnfermedad(data) { 
                this.update = data.id
                let me = this;
                let url = '/enfermedades/buscarEnfermedad/' + this.update;
                axios.get(url).then(function (response) {
                    me.nombre = response.data.nombre;
                    me.descripcion = response.data.descripcion;
                   
             
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            clearFields(modal) {
                this.nombre = "";
                this.descripcion = "";
               
                this.update = 0;
                $(modal).modal('hide');
            },
        },
        mounted() {
            this.getEnfermedads();
        }
    }
</script>
