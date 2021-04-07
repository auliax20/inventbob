<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Kategori extends Component
{
    public $kategoriId, $kode, $nama;
    public $isModal = 0;
    public $kategori;
    public function render()
    {
        $this->kategori = \App\Models\Kategori::get();
        return view('livewire.kategori');
    }
    //FUNGSI INI AKAN DIPANGGIL KETIKA TOMBOL TAMBAH ANGGOTA DITEKAN
    public function create()
    {
        //KEMUDIAN DI DALAMNYA KITA MENJALANKAN FUNGSI UNTUK MENGOSONGKAN FIELD
        $this->resetFields();
        //DAN MEMBUKA MODAL
        $this->openModal();
    }

    //FUNGSI INI UNTUK MENUTUP MODAL DIMANA VARIABLE ISMODAL KITA SET JADI FALSE
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
        $this->kode = '';
        $this->nama = '';
    }
    //METHOD STORE AKAN MENG-HANDLE FUNGSI UNTUK MENYIMPAN / UPDATE DATA
    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'kode' => 'required|unique:kategori,kode,'. $this->kategoriId,
            'nama' => 'required|string'
        ]);

        //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        \App\Models\Kategori::updateOrCreate(['id' => $this->kategoriId], [
            'kode' => $this->kode,
            'nama' => $this->nama
        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', $this->kategoriId ? $this->nama . ' Diperbaharui': $this->nama . ' Ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    //FUNGSI INI UNTUK MENGAMBIL DATA DARI DATABASE BERDASARKAN ID MEMBER
    public function edit($id)
    {
        $kategori = \App\Models\Kategori::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
        $this->kategoriId = $id;
        $this->kode = $kategori->kode;
        $this->nama = $kategori->nama;

        $this->openModal(); //LALU BUKA MODAL
    }

    //FUNGSI INI UNTUK MENGHAPUS DATA
    public function delete($id)
    {
        $kategori = \App\Models\Kategori::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $kategori->delete(); //LALU HAPUS DATA
        session()->flash('message', $kategori->nama . ' Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }

}
