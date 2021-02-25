<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrador',
                'email' => 'administrador@mail.com',
                'password' => Hash::make(1234)
            ],
            [
                'name' => 'Registrador',
                'email' => 'registrador@mail.com',
                'password' => Hash::make(1234)
            ],
            [
                'name' => 'Profesor',
                'email' => 'profesor@mail.com',
                'password' => Hash::make(1234)
            ],
            [
                'name' => 'Estudiante',
                'email' => 'estudiante@mail.com',
                'password' => Hash::make(1234)
            ],
        ]);

        DB::table('roles')->insert([
            [
                'name' => 'administrador',
                'guard_name' => 'web',
            ],
            [
                'name' => 'registrador',
                'guard_name' => 'web',
            ],
            [
                'name' => 'profesor',
                'guard_name' => 'web',
            ],
            [
                'name' => 'estudiante',
                'guard_name' => 'web',
            ],
        ]);

        DB::table('permissions')->insert([
            //1
            [
                'name' => 'createUsuario',
                'guard_name' => 'web',
            ],
            //2
            [
                'name' => 'updateUsuario',
                'guard_name' => 'web',
            ],
            //3
            [
                'name' => 'deleteUsuario',
                'guard_name' => 'web',
            ],
            //4
            [
                'name' => 'listUsuario',
                'guard_name' => 'web',
            ],
            //5
            [
                'name' => 'showUsuario',
                'guard_name' => 'web',
            ],
            //6
            [
                'name' => 'createRol',
                'guard_name' => 'web',
            ],
            //7
            [
                'name' => 'updateRol',
                'guard_name' => 'web',
            ],
            //8
            [
                'name' => 'deleteRol',
                'guard_name' => 'web',
            ],
            //9
            [
                'name' => 'listRol',
                'guard_name' => 'web',
            ],
            //10
            [
                'name' => 'showRol',
                'guard_name' => 'web',
            ],
            //11
            [
                'name' => 'createPermiso',
                'guard_name' => 'web',
            ],
            //12
            [
                'name' => 'updatePermiso',
                'guard_name' => 'web',
            ],
            //13
            [
                'name' => 'deletePermiso',
                'guard_name' => 'web',
            ],
            //14
            [
                'name' => 'listPermiso',
                'guard_name' => 'web',
            ],
            //15
            [
                'name' => 'showPermiso',
                'guard_name' => 'web',
            ],
            //16
            [
                'name' => 'createForo',
                'guard_name' => 'web',
            ],
            //17
            [
                'name' => 'updateForo',
                'guard_name' => 'web',
            ],
            //18
            [
                'name' => 'deleteForo',
                'guard_name' => 'web',
            ],
            //19
            [
                'name' => 'listForo',
                'guard_name' => 'web',
            ],
            //20
            [
                'name' => 'showForo',
                'guard_name' => 'web',
            ],
            //21
            [
                'name' => 'createPregunta',
                'guard_name' => 'web',
            ],
            //22
            [
                'name' => 'updatePregunta',
                'guard_name' => 'web',
            ],
            //23
            [
                'name' => 'deletePregunta',
                'guard_name' => 'web',
            ],
            //24
            [
                'name' => 'listPregunta',
                'guard_name' => 'web',
            ],
            //25
            [
                'name' => 'showPregunta',
                'guard_name' => 'web',
            ],
            //26
            [
                'name' => 'createRespuesta',
                'guard_name' => 'web',
            ],
            //27
            [
                'name' => 'updateRespuesta',
                'guard_name' => 'web',
            ],
            //28
            [
                'name' => 'deleteRespuesta',
                'guard_name' => 'web',
            ],
            //29
            [
                'name' => 'listRespuesta',
                'guard_name' => 'web',
            ],
            //30
            [
                'name' => 'showRespuesta',
                'guard_name' => 'web',
            ],
            //31
            [
                'name' => 'showDashboard',
                'guard_name' => 'web',
            ],

        ]);

        DB::table('role_has_permissions')->insert([
            [
                'role_id' => '1',
                'permission_id' => '1',
            ],
            [
                'role_id' => '1',
                'permission_id' => '2',
            ],
            [
                'role_id' => '1',
                'permission_id' => '3',
            ],
            [
                'role_id' => '1',
                'permission_id' => '4',
            ],
            [
                'role_id' => '1',
                'permission_id' => '5',
            ],
            [
                'role_id' => '1',
                'permission_id' => '6',
            ],
            [
                'role_id' => '1',
                'permission_id' => '7',
            ],
            [
                'role_id' => '1',
                'permission_id' => '8',
            ],
            [
                'role_id' => '1',
                'permission_id' => '9',
            ],
            [
                'role_id' => '1',
                'permission_id' => '10',
            ],
            [
                'role_id' => '1',
                'permission_id' => '11',
            ],
            [
                'role_id' => '1',
                'permission_id' => '12',
            ],
            [
                'role_id' => '1',
                'permission_id' => '13',
            ],
            [
                'role_id' => '1',
                'permission_id' => '14',
            ],
            [
                'role_id' => '1',
                'permission_id' => '15',
            ],
            [
                'role_id' => '1',
                'permission_id' => '16',
            ],
            [
                'role_id' => '1',
                'permission_id' => '17',
            ],
            [
                'role_id' => '1',
                'permission_id' => '18',
            ],
            [
                'role_id' => '1',
                'permission_id' => '19',
            ],
            [
                'role_id' => '1',
                'permission_id' => '20',
            ],
            [
                'role_id' => '1',
                'permission_id' => '21',
            ],
            [
                'role_id' => '1',
                'permission_id' => '22',
            ],
            [
                'role_id' => '1',
                'permission_id' => '23',
            ],
            [
                'role_id' => '1',
                'permission_id' => '24',
            ],
            [
                'role_id' => '1',
                'permission_id' => '25',
            ],
            [
                'role_id' => '1',
                'permission_id' => '26',
            ],
            [
                'role_id' => '1',
                'permission_id' => '27',
            ],
            [
                'role_id' => '1',
                'permission_id' => '28',
            ],
            [
                'role_id' => '1',
                'permission_id' => '29',
            ],
            [
                'role_id' => '1',
                'permission_id' => '30',
            ],
            [
                'role_id' => '2',
                'permission_id' => '1',
            ],
            [
                'role_id' => '2',
                'permission_id' => '2',
            ],
            [
                'role_id' => '2',
                'permission_id' => '3',
            ],
            [
                'role_id' => '2',
                'permission_id' => '4',
            ],
            [
                'role_id' => '2',
                'permission_id' => '5',
            ],
            [
                'role_id' => '3',
                'permission_id' => '19',
            ],
            [
                'role_id' => '3',
                'permission_id' => '21',
            ],
            [
                'role_id' => '3',
                'permission_id' => '22',
            ],
            [
                'role_id' => '3',
                'permission_id' => '23',
            ],
            [
                'role_id' => '3',
                'permission_id' => '24',
            ],
            [
                'role_id' => '3',
                'permission_id' => '25',
            ],
            [
                'role_id' => '3',
                'permission_id' => '26',
            ],
            [
                'role_id' => '3',
                'permission_id' => '27',
            ],
            [
                'role_id' => '3',
                'permission_id' => '28',
            ],
            [
                'role_id' => '3',
                'permission_id' => '29',
            ],
            [
                'role_id' => '3',
                'permission_id' => '30',
            ],
            [
                'role_id' => '3',
                'permission_id' => '31',
            ],
            [
                'role_id' => '4',
                'permission_id' => '19',
            ],
            [
                'role_id' => '4',
                'permission_id' => '21',
            ],
            [
                'role_id' => '4',
                'permission_id' => '22',
            ],
            [
                'role_id' => '4',
                'permission_id' => '23',
            ],
            [
                'role_id' => '4',
                'permission_id' => '24',
            ],
            [
                'role_id' => '4',
                'permission_id' => '25',
            ],
            [
                'role_id' => '4',
                'permission_id' => '26',
            ],
            [
                'role_id' => '4',
                'permission_id' => '27',
            ],
            [
                'role_id' => '4',
                'permission_id' => '28',
            ],
            [
                'role_id' => '4',
                'permission_id' => '29',
            ],
            [
                'role_id' => '4',
                'permission_id' => '30',
            ],
            [
                'role_id' => '4',
                'permission_id' => '31',
            ],
        ]);

        DB::table('model_has_roles')->insert([
            [
                'role_id' => '1',
                'model_type' => 'App\Models\User',
                'model_id' => '1',
            ],
            [
                'role_id' => '2',
                'model_type' => 'App\Models\User',
                'model_id' => '2',
            ],
            [
                'role_id' => '3',
                'model_type' => 'App\Models\User',
                'model_id' => '3',
            ],
            [
                'role_id' => '4',
                'model_type' => 'App\Models\User',
                'model_id' => '4',
            ],
        ]);
    }
}
