<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Karcis extends Component
{
    public $karcisId, $kode, $kategoriId, $nama, $warna, $isi, $no_seri;
    public $isModal = 0;
    public $karcis;
    public function render()
    {
        $this->karcis = \App\Models\Karcis::get();
        return view('livewire.karcis');
    }
}
