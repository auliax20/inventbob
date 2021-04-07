<x-slot name="header">
    <h3 class="font-semibold text-lg text-gray-600 leading-tight">Karcis</h3>
</x-slot>

<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-sm my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Tambah Kategori</button>

            @if($isModal)
                @include('livewire.createKategori')
            @endif

            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Kode Kategori</th>
                    <th class="px-4 py-2">Nama Kategori</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($kategori as $row)
                    <tr>
                        <td class="border px-4 py-2">{{ $row->kode }}</td>
                        <td class="border px-4 py-2">{{ $row->nama }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $row->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $row->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="3">Tidak ada data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
