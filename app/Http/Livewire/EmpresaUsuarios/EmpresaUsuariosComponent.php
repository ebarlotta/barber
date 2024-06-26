<?php

namespace App\Http\Livewire\EmpresaUsuarios;

use Livewire\Component;
use App\Models\EmpresaUsuario;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Livewire\WithPagination;

class EmpresaUsuariosComponent extends Component
{
    public $isModalOpen = false;

    public $name;

    public $usuariosglobales;
    public $usuariosdelaempresa;
    public $usuariosdelaemp;
    public $usuariosNOempresa;
    public $empresas;
    public $empresaseleccionada;
    public $seleccionado=1;

    use WithPagination;

    public function render()
    {
        $this->usuariosglobales= User::all();
        $this->empresas = Empresa::all()->sortBy('id');
<<<<<<< HEAD
        return view('livewire.empresa-usuarios.empresa-usuarios-component',['datos'=>Empresa::OrderBy('id')->paginate(3)])->extends('layouts.adminlte')
        ->section('content'); //Enzo
=======
        return view('livewire.empresa-usuarios.empresa-usuarios-component',['datos'=>Empresa::OrderBy('id')->paginate(3),])->extends('layouts.adminlte');
<<<<<<< HEAD
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52
    }

    public function mostrarmodal()
    {
        $this->isModalOpen = true;
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }   

    public function CargarUsuarios($id)
    {
        $this->empresaseleccionada = Empresa::find($id);
<<<<<<< HEAD
=======
        $this->seleccionado=$id;
<<<<<<< HEAD
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52
        $this->usuariosdelaempresa = DB::table('users')->distinct()
            ->join('empresa_usuarios', 'users.id', '=', 'empresa_usuarios.user_id')
            ->join('empresas',  'empresas.id', '=', 'empresa_usuarios.empresa_id',)
            ->where('empresas.id', $this->empresaseleccionada->id)
            ->select('users.*', 'empresas.name as empresa')
            ->get();
            $this->usuariosdelaemp = $this->usuariosdelaempresa;
        $array = json_decode($this->usuariosdelaempresa, true);
        $this->usuariosdelaempresa=$array;
        $this->usuariosNOempresa=User::all();
    }

    public function AgregarUsuario($user_id)
    {
        EmpresaUsuario::create(['empresa_id' => $this->empresaseleccionada->id, 'user_id' => $user_id]);
        $this->closeModalPopover();
        $this->usuarios = User::all();
        $this->CargarUsuarios($this->empresaseleccionada->id);
        return view('livewire.empresa-usuarios.empresa-usuarios-component');
    }

    public function EliminarUsuario($user_id)
    {
        $a = EmpresaUsuario::where('empresa_id', "=", $this->empresaseleccionada->id)
            ->where('user_id', "=", $user_id)->delete();
        $this->closeModalPopover();
        $this->usuarios = User::all();
        $this->CargarUsuarios($this->empresaseleccionada->id);
        return view('livewire.empresa-usuarios.empresa-usuarios-component');
    }
}
