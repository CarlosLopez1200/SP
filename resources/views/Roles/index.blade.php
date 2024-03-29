@extends('layouts.app')
@section('title')
Roles
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-rol')
                                <a class="btn btn-warning" href="{{ route('Roles.create') }}">Nuevo</a>                        
                            @endcan
                            <div class="table-responsive">
                                <table class="table table-striped mt-2">
                                    <thead style="background-color:#6777ef">                                                       
                                        <th class="text-center" style="color:#fff;">Rol</th>
                                        <th class="text-center" style="color:#fff;">Acciones</th>
                                    </thead>  
                                    <tbody>
                                        @foreach ($roles as $role)
                                        <tr>                           
                                            <td>{{ $role->name }}</td>
                                            <td>                                
                                                @can('editar-rol')
                                                    <a class="btn btn-primary" href="{{ route('Roles.edit',$role->id) }}">Editar</a>
                                                @endcan
                                                @can('borrar-rol')
                                                    {!! Form::open(['method' => 'DELETE','route' => ['Roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>               
                                </table>
                            </div>
                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!} 
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection