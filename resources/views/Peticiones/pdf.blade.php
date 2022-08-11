@extends('layouts.pdf')

@section('content')
    <section class="section">
        <h3 class="page__heading">Peticiones</h3>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead style="background-color:#6777ef">                                     
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Solicitante</th>
                                        <th style="color:#fff;">Direccion</th>  
                                        <th style="color:#fff;">Numero de Telofono</th>  
                                        <th style="color:#fff;">Fecha de solicitud</th>  
                                        <th style="color:#fff;">Estatus</th>
                                        <th style="color:#fff;">Encargado</th>  
                                        <th style="color:#fff;">Servicio</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($peticiones as $peticion)
                                        <tr>
                                            <td style="display: none;">{{ $peticion->id }}</td>                                
                                            <td>{{ $peticion->Solicitante }}</td>
                                            <td>{{ $peticion->Direccion }}</td>
                                            <td>{{ $peticion->Numero }}</td>
                                            <td>{{ $peticion->Fecha }}</td>
                                            <td>{{ $peticion->Estatus }}</td>
                                            <td>{{ $peticion->usuario_id }}</td>
                                            <td>{{ $peticion->servicio_id }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
