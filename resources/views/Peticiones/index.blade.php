@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Peticiones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-peticion')
                                <a class="btn btn-warning" href="{{ route('Peticiones.create') }}">Nuevo</a>
                                <a class="btn btn-info" href="">Imprimir</a>
                            @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Solicitante</th>
                                    <th style="color:#fff;">Direccion</th>  
                                    <th style="color:#fff;">Numero de Telofono</th>  
                                    <th style="color:#fff;">Fecha de solicitud</th>  
                                    <th style="color:#fff;">Estatus</th>
                                    <th style="color:#fff;">Encargado</th>  
                                    <th style="color:#fff;">Servicio</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
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
                                <td>
                                    <a class="btn btn-info" href="{{ route('Peticiones.edit', $peticion->id) }}">Editar</a>

                                    {!! Form::open(['method'=> 'DELETE', 'route'=> ['Servicios.destroy', $peticion->id], 'style'=>'display:inline']) !!}
                                        {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $peticiones->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
