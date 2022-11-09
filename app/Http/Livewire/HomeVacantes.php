<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    protected $listeners = ['MostrarVacantes' =>'VacantesFiltradas' ];


    public $termino;
    public $salario;
    public $categoria;


    public function VacantesFiltradas($termino, $salario, $categoria)
    {
        
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }


    public function render()
    {
    //     $vacantes = Vacante::all();
    $vacantes = Vacante::when($this->termino, function($query){
        $query->where('titulo','LIKE','%' . $this->termino . '%');

    })->when($this->termino, function($query){
        $query->OrWhere('empresa','LIKE','%' . $this->termino . '%');
    
    })->when($this->categoria, function($query){
        $query->where('categoria_id',$this->categoria);
    })
    ->when($this->salario, function($query){
        $query->where('salario_id',$this->salario);
    })
    
    ->paginate(10);


        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
