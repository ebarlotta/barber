<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(IvaSeeder::class);
        
        DB::table('empresas')->insert(['name' => 'Empresa de Pruebas','direccion' => 'Dirección','cuit' => '20123456789','ib' => '012345678','imagen' => 'BarBer.png','establecimiento' => '0','telefono' => '12345678','actividad' => 'Desarrollo','actividad1' => 'Software','menu' => '2',]);
        \App\Models\Empresa::factory(4)->create();   //Crea una empresa de prueba para relacionar con los usuarios que se dan de alta

        $this->call(TablaSeeder::class);

        \App\Models\Area::factory(30)->create();
        \App\Models\Cuenta::factory(30)->create();
        \App\Models\Cliente::factory(10)->create();
        \App\Models\Proveedor::factory(100)->create();
        \App\Models\Categoriaprofesional::factory(10)->create();
        \App\Models\Concepto::factory(10)->create();
        \App\Models\EmpresaUsuario::factory(10)->create();
        // \App\Models\Modulo::factory(10)->create();
        DB::table('modulos')->insert(['name' => 'Areas','pagina' => 'areas','imagen' => 'areas.jpg','leyenda' => '',]);
        DB::table('modulos')->insert(['name' => 'Clientes','pagina' => 'clientes','imagen' => 'clientes.jpg','leyenda' => '',]);
        DB::table('modulos')->insert(['name' => 'Compras','pagina' => 'compras','imagen' => 'compras.jpg','leyenda' => '',]);
        DB::table('modulos')->insert(['name' => 'Cuentas','pagina' => 'cuentas','imagen' => 'cuentas.jpg','leyenda' => '',]);
        DB::table('modulos')->insert(['name' => 'Empleados','pagina' => 'empleados','imagen' => 'empleados.jpg','leyenda' => '',]);
        DB::table('modulos')->insert(['name' => 'Proveedores','pagina' => 'proveedores','imagen' => 'proveedores.jpg','leyenda' => '',]);
        DB::table('modulos')->insert(['name' => 'Ventas','pagina' => 'ventas','imagen' => 'ventas.jpg','leyenda' => '',]);
        
        //Ralaciona los módulos de la empresa de prueba 
        $this->call(EmpresaModuloSeeder::class);
        \App\Models\Empleado::factory(10)->create();
        \App\Models\EmpresaModulo::factory(10)->create();
        \App\Models\ModuloUsuario::factory(10)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\Unidad::factory(10)->create();
        \App\Models\Categoriaproducto::factory(10)->create();
        \App\Models\Estado::factory(50)->create();
//        \App\Models\Tabla::factory(10)->create();
        
    }
}
