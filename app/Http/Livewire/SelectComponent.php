<?php

namespace App\Http\Livewire;

use App\Models\Recopasec\Estado;
use App\Models\Recopasec\Municipio;
use App\Models\Recopasec\Parroquia;
use Livewire\Component;

class SelectComponent extends Component
{
    public $estado, $municipio, $parroquia;
    public $estados = [], $municipios = [], $parroquias = [];

    public function mount(){
        $this->estados = Estado::all();
        $this->municipios = collect();
        $this->parroquias = collect();
    }
    public function updatedEstado($value){
        $this->municipios = Municipio::where('estado_id', $value)->get();
        $this->municipio = $this->municipios->first()->id ?? null;
    }
    public function updatedMunicipio($value){
        $this->parroquias = Parroquia::where('municipio_id', $value)->get();
        $this->parroquia = $this->parroquias->first()->id ?? null;
    }
    public function render()
    {
        return view('livewire.select-component');
    }
}
