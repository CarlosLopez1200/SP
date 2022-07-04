@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4 col-xl-4">
                                    
                                    <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                            <h5 class="text-white">Usuarios</h5>                                               
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                                <h2 class="text-right text-white"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/Usuarios" class="text-white">Ver más</a></p>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                            <h5 class="text-white">Peticiones</h5>                                               
                                                @php
                                                use App\Models\peticiones;
                                                 $cant_peticiones = peticiones::count();                                                
                                                @endphp
                                                <h2 class="text-right text-white"><i class="fa fa-edit f-left"></i><span>{{$cant_peticiones}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/Peticiones" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>                                                                
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5 class="text-white">Servicios</h5>                                               
                                                @php
                                                 use App\Models\servicios;
                                                $cant_servicios = servicios::count();                                                
                                                @endphp
                                                <h2 class="text-right text-white"><i class="fa fa-tasks f-left"></i><span>{{$cant_servicios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/Servicios" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection