<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Karcis extends Component
{
    public $karcisId, $kategoriId, $nama, $warna, $isi, $no_seri, $isTyped, $isEmpty, $search;
    public $isModal = 0;
    public $allkategori = [];
    public $karcis;
    public function render()
    {
        $kategori = new \App\Models\Kategori();
        $this->karcis = \App\Models\Karcis::with('kategori')->get();
        $this->allkategori = $kategori::get();
        return view('livewire.karcis');
    }
    public function create()
    {
        //KEMUDIAN DI DALAMNYA KITA MENJALANKAN FUNGSI UNTUK MENGOSONGKAN FIELD
        $this->resetFields();
        //DAN MEMBUKA MODAL
        $this->openModal();
    }
    public function closeModal()
    {
        $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
        $this->isModal = true;
    }
    public function resetFields()
    {
        $this->kategoriId = '';
        $this->nama = '';
        $this->warna = '';
        $this->isi = '';
        $this->no_seri = '';
    }
    //METHOD STORE AKAN MENG-HANDLE FUNGSI UNTUK MENYIMPAN / UPDATE DATA
    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'nama' => 'required|string',
            'warna'=>'required|string',
            'isi'=>'required|string',
            'no_seri'=>'required|string',
            'kategoriId'=>'required|string|exists:kategori,id'
        ]);

        //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        \App\Models\Karcis::updateOrCreate(['id' => $this->karcisId], [
            'nama' => $this->nama,
            'warna'=>$this->warna,
            'isi'=>$this->isi,
            'no_seri'=>$this->no_seri,
            'kategori_id'=>$this->kategoriId,

        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', $this->karcisId ? $this->nama . ' Diperbaharui': $this->nama . ' Ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }
}
