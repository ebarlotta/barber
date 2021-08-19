<?php

namespace App\Http\Livewire\Proveedor;

use Livewire\Component;
use App\Models\Proveedor;

class ProveedorComponent extends Component
{
    public $isModalOpen = false;
    public $proveedor, $proveedor_id;
    public $proveedores;

    public $name;
    public $direccion;
    public $cuit;
    public $telefono;
    public $email;

    public $empresa_id;

    public function render()
    {
        $this->empresa_id=session('empresa_id');
        $this->proveedores = Proveedor::where('empresa_id', $this->empresa_id)->get();
        return view('livewire.proveedor.proveedor-component');
    }

    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.proveedor.createproveedores')->with('isModalOpen', $this->isModalOpen)->with('name', $this->name);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->proveedor_id = '';

        $this->name = '';
        $this->direccion = '';
        $this->cuit = '';
        $this->telefono = '';
        $this->email = '';
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'direccion' => 'required',
            'cuit' => 'required|integer',
            'telefono' => 'required|integer',
            'email' => 'required|email',
        ]);
        Proveedor::updateOrCreate(['id' => $this->proveedor_id], [
            'name' => $this->name,
            'empresa_id' => $this->empresa_id,
            'direccion' => $this->direccion,
            'cuit' => $this->cuit,
            'telefono' => $this->telefono,
            'email' => $this->email,
        ]);

        session()->flash('message', $this->proveedor_id ? 'Proveedor Actualizado.' : 'Proveedor Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $this->id = $id;
        $this->proveedor_id=$id;
        $this->name = $proveedor->name;
        $this->direccion = $proveedor->direccion;
        $this->cuit = $proveedor->cuit;
        $this->telefono = $proveedor->telefono;
        $this->email = $proveedor->email;

        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Proveedor::find($id)->delete();
        session()->flash('message', 'Proveedor Eliminado.');
    }

}