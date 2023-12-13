<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count; //se puede inicialziar aquí pero lo hacemos al importar el componente como atributo.
    public $alert='';
    public $titulo;
    public $descripcion;

    public function render()
    {
        return view('livewire.counter');
    }
    public function mount($count,$datos){ //Inicializa los atributos
        $this->count=$count;
        $this->titulo=$datos['titulo'];
        $this->descripcion=$datos['descripcion'];
    }
    public function increment(){
        $this->count++;
        $this->alert='';
    }
    public function decrement(){
        if($this->count>0){
            $this->count--;
            $this->alert='';
        }else{
            $this->alert='No puedes bajar de 0!';
        }
    }
}
