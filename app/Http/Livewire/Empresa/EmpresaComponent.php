<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Empresa;
use App\Models\EmpresaUsuario;
use Livewire\Component;
use App\Models\EmpresaModulo;
use App\Models\Modulo;



class EmpresaComponent extends Component
{
    public $empresas;
    public $empresa_id;

    public function render()
    {
        $userid=auth()->user()->id;
        //$empresas_usuario = EmpresaUsuario::where('user_id',$userid)->get('id');
        //$this->empresas=Empresa::find($empresas_usuario);
        //$this->empresas=EmpresaUsuario::where('user_id',$userid)->get('id');
        $empresas_usuario = EmpresaUsuario::where('user_id',$userid)->get();
        //dd($userid);
        //dd($empresas_usuario);
        foreach($empresas_usuario as $empresa) {
            //dd($empresa->empresa_id);
            $this->empresas[] = Empresa::find($empresa->empresa_id);
        }
<<<<<<< HEAD
        
=======
        //dd($this->empresas[2]);
<<<<<<< HEAD
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52
        return view('livewire.empresa.empresa-component');
    }

    public function cargamodulos($id) {
        // Establece el id de la empresaa modo global
        session(['empresa_id' => $id]);
        //sleep(2);
        $this->empresa_id=$id;

        $a = Empresa::find($id);
        session(['nombre_empresa' => $a->name]);
        //dd(session('empresa_id'));
<<<<<<< HEAD
        $empresa_modulos = EmpresaModulo::where('empresa_id',$this->empresa_id)->get('modulo_id');
=======
        ////$empresa_modulos = EmpresaModulo::where('empresa_id',$this->empresa_id)->get('modulo_id');
<<<<<<< HEAD
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52
        // $modulos=Modulo::find($empresa_modulos);
        //return view('livewire.modulo.modulo-component',$empresa_modulos);
        return redirect('modulos');
    }

    public function configurarempresa($id) {
        $this->empresa_id=$id;
        return redirect('empresausuarios');
    }
    
    // public static function login() {
    //     $userid=auth()->user()->id;
    //     $empresas_usuario = EmpresaUsuario::where('user_id',$userid)->get();
    //     foreach($empresas_usuario as $empresa) {
    //         $empresas_del_usuario[] = Empresa::find($empresa->empresa_id);
    //     }
    //     return view('livewire.empresa.empresa-component',compact(['empresas'=>$empresas_del_usuario]));
    //     //return $empresas_del_usuario;
    // }

}
