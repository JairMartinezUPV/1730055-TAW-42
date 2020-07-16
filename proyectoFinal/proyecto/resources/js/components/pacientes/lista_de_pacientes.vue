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
                   
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPaciente">
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
                            <th>Sexo</th>
                            <th>Peso</th>
                            <th>Estatura</th>
                            <th>Domicilio</th>
                            <th>Telefono</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="paciente in pacientes" :key="paciente.id">
                          
                            <td>
                                <!-- EDITAR -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modalPaciente" @click="cargarPaciente(paciente)">
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
                                                <h4 class="modal-title">Eliminar paciente</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <a id="valor"></a>
                                            <div class="modal-body">
                                                <p>¿Estas seguro de eliminar el paciente?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cerrar
                                                </button>
                                                <button type="button" class="btn btn-danger"
                                                        @click="deletePaciente(paciente.id)" data-dismiss="modal">Eliminar
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </td>
                            <!-------- VALORES DE LA TABLA-------->
                            <td v-text="paciente.nombre"></td>
                            <td v-text="paciente.apellido"></td>
                            <td v-text="paciente.sexo"></td>
                            <td v-text="paciente.peso"></td>
                            <td v-text="paciente.estatura"></td>
                            <td v-text="paciente.domicilio"></td>
                            <td v-text="paciente.telefono"></td>


                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>


        <!--MODAL PARA AGREGAR Y ACTUALIZAR-->
        <div class="modal fade" id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar paciente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                @click="clearFields('#modalPaciente')">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="form-horizontal" data-parsley-validate>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nombre</label>
                                <div class="col-md-9">
                                    <input v-model="nombre" type="text" id="nombre" name="nombre" class="form-control"
                                           placeholder="Nombre del paciente">
                                    
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
                                <label class="col-md-3 form-control-label">Sexo</label>
                                <div class="col-md-9">
                                    <input v-model="sexo" type="text" id="sexo" name="sexo"
                                           class="form-control"
                                           placeholder="Ingrese el sexo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Peso</label>
                                <div class="col-md-9">
                                    <input v-model="peso" type="number" id="peso" name="peso"
                                           class="form-control"
                                           placeholder="Ingrese el peso">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Estatura</label>
                                <div class="col-md-9">
                                    <input v-model="estatura" type="number" id="estatura" name="estatura"
                                           class="form-control"
                                           placeholder="Ingrese la estatura">
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



                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="clearFields('#modalPaciente')">Cerrar
                        </button>
                        <button type="button" v-if="update == 0" class="btn btn-primary" @click="addPaciente()">
                            Guardar
                        </button>
                        <button type="button" v-if="update != 0" class="btn btn-primary" @click="updatePaciente()">
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
                sexo: "",
                peso: "",
                estatura: "",
                domicilio: "",
                telefono: "",
               
                 update: 0,
                pacientes: []
            }
        },
        ////////////////////////// Se obtienen los resultados de la tabla
        methods: {
            getPacientes() {
                let me = this;
                let url = '/pacientes/obtenerPacientes';
                axios.get(url).then(function (response) {
                    me.pacientes = response.data;
                    console.log(me.pacientes);
                }).catch(function (error) {
                    console.log(error);
                });
            },
            ////////////////////////// Se elimina el paciente seleccionado
            deletePaciente(id) {
                let me = this;
                let url = '/pacientes/eliminarPaciente/' + id;
                axios.delete(url).then(function (response) {
                    me.getPacientes();
                    $('modalEliminar').modal('hide');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            ///////////////////// CREA EL REGISTRO DEL paciente
            addPaciente() {
                let me = this;
                let url = '/pacientes/agregarPaciente';
                axios.post(url, { 
                    'nombre': this.nombre,
                    'apellido': this.apellido,
                    'sexo': this.sexo,
                    'peso': this.peso,
                    'estatura': this.estatura,
                    'domicilio': this.domicilio,
                    'telefono': this.telefono,
                   
                }).then(function (response) {
                    me.getPacientes();   
                    me.clearFields('#modalPaciente'); 
                }).catch(function (error) {
                    console.log(error);
                });
            },
            ///////////////////// ACTUALIZA EL REGISTRO DEL paciente
            updatePaciente() {
                let me = this;
                let url = '/pacientes/editarPaciente';
                axios.patch(url, { 
                    'id': this.update,
                    'nombre': this.nombre,
                    'apellido': this.apellido,
                    'sexo': this.sexo,
                    'peso': this.peso,
                    'estatura': this.estatura,
                    'domicilio': this.domicilio,
                    'telefono': this.telefono,
                    
                 
                }).then(function (response) {
                    me.getPacientes();    
                    me.clearFields('#modalPaciente');  
                }).catch(function (error) {
                    console.log(error);
                });
            },
            //////////////////////7 SE BUSCA EL Paciente SELECCIONADO
            cargarPaciente(data) { 
                this.update = data.id
                let me = this;
                let url = '/pacientes/buscarPaciente/' + this.update;
                axios.get(url).then(function (response) {
                    me.nombre = response.data.nombre;
                    me.apellido = response.data.apellido;
                    me.sexo = response.data.sexo;
                    me.peso = response.data.peso;
                    me.estatura = response.data.estatura;
                    me.domicilio = response.data.domicilio;
                    me.telefono = response.data.telefono;
                   
             
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            clearFields(modal) {
                this.nombre = "";
                this.apellido = "";
                this.sexo = "";
                this.peso = "";
                this.estatura = "";
                this.domicilio = "";
                this.telefono = "";
               
                this.update = 0;
                $(modal).modal('hide');
            },
        },
        mounted() {
            this.getPacientes();
        }
    }
</script>
