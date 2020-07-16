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
                   
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalMedico">
                        <i class="fa fa-plus-circle"></i>&nbsp;  <b>Agregar </b>
                    </button>


                  
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Sexo</th>
                            <th>Domicilio</th>
                            <th>Telefono</th>
                            <th>Tipo</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="medico in medicos" :key="medico.id">
                          
                            <td>
                                <!-- EDITAR -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modalMedico" @click="cargarMedico(medico)">
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
                                                <h4 class="modal-title">Eliminar medico</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <a id="valor"></a>
                                            <div class="modal-body">
                                                <p>¿Estas seguro de eliminar el medico?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cerrar
                                                </button>
                                                <button type="button" class="btn btn-danger"
                                                        @click="deleteMedico(medico.id)" data-dismiss="modal">Eliminar
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </td>
                            <!-------- VALORES DE LA TABLA-------->
                            <td v-text="medico.nombre"></td>
                            <td v-text="medico.apellido"></td>
                            <td v-text="medico.usuario"></td>
                            <td v-text="medico.clave"></td>
                            <td v-text="medico.sexo"></td>
                            <td v-text="medico.domicilio"></td>
                            <td v-text="medico.telefono"></td>
                            <td v-text="medico.tipo"></td>


                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>


        <!--MODAL PARA AGREGAR Y ACTUALIZAR-->
        <div class="modal fade" id="modalMedico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar medico</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                @click="clearFields('#modalMedico')">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="form-horizontal" data-parsley-validate>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nombre</label>
                                <div class="col-md-9">
                                    <input v-model="nombre" type="text" id="nombre" name="nombre" class="form-control"
                                           placeholder="Nombre del medico">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Apellido</label>
                                <div class="col-md-9">
                                    <input v-model="apellido" type="text" id="apellido" name="apellido"
                                           class="form-control"
                                           placeholder="Ingrese el apellido">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Usuario</label>
                                <div class="col-md-9">
                                    <input v-model="usuario" type="text" id="usuario" name="usuario"
                                           class="form-control"
                                           placeholder="Ingrese el usuario">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Contraseña</label>
                                <div class="col-md-9">
                                    <input v-model="clave" type="password" id="clave" name="clave"
                                           class="form-control"
                                           placeholder="Ingrese la contraseña">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Sexo</label>
                                <div class="col-md-9">
                                    <input v-model="sexo" type="text" id="sexo" name="sexo"
                                           class="form-control"
                                           placeholder="Ingrese el sexo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Domicilio</label>
                                <div class="col-md-9">
                                    <input v-model="domicilio" type="text" id="domicilio" name="domicilio"
                                           class="form-control"
                                           placeholder="Ingrese el domicilio">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Telefono</label>
                                <div class="col-md-9">
                                    <input v-model="telefono" type="text" id="telefono" name="telefono"
                                           class="form-control"
                                           placeholder="Ingrese el telefono">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Tipo</label>
                                <div class="col-md-9">
                                    <input v-model="tipo" type="number" id="tipo" name="tipo"
                                           class="form-control"
                                           placeholder="Ingrese el tipo">
                                </div>
                            </div>



                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="clearFields('#modalMedico')">Cerrar
                        </button>
                        <button type="button" v-if="update == 0" class="btn btn-primary" @click="addMedico()">
                            Guardar
                        </button>
                        <button type="button" v-if="update != 0" class="btn btn-primary" @click="updateMedico()">
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
                apellido: "",
                usuario: "",
                clave: "",
                sexo: "",
                domicilio: "",
                telefono: "",
                tipo: "",
               
                 update: 0,
                medicos: []
            }
        },
        ////////////////////////// Se obtienen los resultados de la tabla
        methods: {
            getMedicos() {
                let me = this;
                let url = '/medicos/obtenerMedicos';
                axios.get(url).then(function (response) {
                    me.medicos = response.data;
                    console.log(me.medicos);
                }).catch(function (error) {
                    console.log(error);
                });
            },
            ////////////////////////// Se elimina el medico seleccionado
            deleteMedico(id) {
                let me = this;
                let url = '/medicos/eliminarMedico/' + id;
                axios.delete(url).then(function (response) {
                    me.getMedicos();
                    $('modalEliminar').modal('hide');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            ///////////////////// CREA EL REGISTRO DEL medico
            addMedico() {
                let me = this;
                let url = '/medicos/agregarMedico';
                axios.post(url, { 
                    'nombre': this.nombre,
                    'apellido': this.apellido,
                    'usuario': this.usuario,
                    'clave': this.clave,
                    'sexo': this.sexo,
                    'domicilio': this.domicilio,
                    'telefono': this.telefono,
                    'tipo': this.tipo,
                   
                }).then(function (response) {
                    me.getMedicos();   
                    me.clearFields('#modalMedico'); 
                }).catch(function (error) {
                    console.log(error);
                });
            },
            ///////////////////// ACTUALIZA EL REGISTRO DEL medico
            updateMedico() {
                let me = this;
                let url = '/medicos/editarMedico';
                axios.patch(url, { 
                    'id': this.update,
                    'nombre': this.nombre,
                    'apellido': this.apellido,
                    'usuario': this.usuario,
                    'clave': this.clave,
                    'sexo': this.sexo,
                    'domicilio': this.domicilio,
                    'telefono': this.telefono,
                    'tipo': this.tipo,
                    
                 
                }).then(function (response) {
                    me.getMedicos();    
                    me.clearFields('#modalMedico');  
                }).catch(function (error) {
                    console.log(error);
                });
            },
            //////////////////////7 SE BUSCA EL Medico SELECCIONADO
            cargarMedico(data) { 
                this.update = data.id
                let me = this;
                let url = '/medicos/buscarMedico/' + this.update;
                axios.get(url).then(function (response) {
                    me.nombre = response.data.nombre;
                    me.apellido = response.data.apellido;
                    me.usuario = response.data.usuario;
                    me.clave = response.data.clave;
                    me.sexo = response.data.sexo;
                    me.domicilio = response.data.domicilio;
                    me.telefono = response.data.telefono;
                    me.tipo = response.data.tipo;
                   
             
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            clearFields(modal) {
                this.nombre = "";
                this.apellido = "";
                this.usuario = "";
                this.clave = "";
                this.sexo = "";
                this.domicilio = "";
                this.telefono = "";
                this.tipo = "";
               
                this.update = 0;
                $(modal).modal('hide');
            },
        },
        mounted() {
            this.getMedicos();
        }
    }
</script>
