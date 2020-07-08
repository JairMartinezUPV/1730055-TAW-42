@extends('ventas')
@section('contenido')
    <main class="main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="container-fluid">
                    <!-- ejemplo de la tabla listado-->
                    <tabla-component></tabla-component>
                </div>
                <!--modal eliminar-->
                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Eliminar Producto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Estas seguro de eliminar el producto?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <example-component></example-component> -->
            </main>
@endsection