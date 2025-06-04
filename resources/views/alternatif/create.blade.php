@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Alternatif</h1>
    <form action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Nama Alternatif</label>
            <input type="text" name="nama_alternatif" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Nilai K1</label>
            <input type="number" name="nilai_k1" step="0.01" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Nilai K2</label>
            <input type="number" name="nilai_k2" step="0.01" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Nilai K3</label>
            <input type="number" name="nilai_k3" step="0.01" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Nilai K4</label>
            <input type="number" name="nilai_k4" step="0.01" class="w-full border p-2 rounded" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection