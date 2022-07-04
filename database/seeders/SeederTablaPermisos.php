<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            // tabla roles
             'ver-rol',
             'crear-rol',
             'editar-rol',
             'borrar-rol',
        
            // tabla peticiones
             'ver-peticion',
             'crear-peticion',
             'editar-peticion',
             'borrar-peticion',

             // tabla servicios
             'ver-servicio',
             'crear-servicio',
             'editar-servicio',
             'borrar-servicio',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
