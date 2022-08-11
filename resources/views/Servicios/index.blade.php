@extends('layouts.app')
@section('title')
Servicios
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Servicios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-servicio')
                                <a class="btn btn-warning" href="{{ route('Servicios.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive">
                                <table class="table table-striped mt-2">
                                    <thead style="background-color:#6777ef">                                     
                                        <th class="text-center" style="display: none;">ID</th>
                                        <th class="text-center" style="color:#fff;">Nombre</th>
                                        <th class="text-center" style="color:#fff;">Descripcion</th>                                    
                                        <th class="text-center" style="color:#fff;">Acciones</th>                                                                   
                                    </thead>
                                    <tbody>
                                        @foreach ($servicios as $servicio)
                                        <tr>
                                            <td style="display: none;">{{ $servicio->id }}</td>                                
                                            <td>{{ $servicio->Nombre }}</td>
                                            <td>{{ $servicio->Descripcion }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('Servicios.edit', $servicio->id) }}">Editar</a>
                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['Servicios.destroy', $servicio->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $servicios->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection