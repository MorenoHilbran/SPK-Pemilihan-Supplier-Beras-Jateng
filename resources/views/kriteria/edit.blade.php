@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Kriteria</h1>
    <form action="{{ route('kriteria.update', $kriteria) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Bobot</label>
            <input type="number" name="bobot" step="0.00001" value="{{ $kriteria->bobot }}" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Tipe</label>
            <select name="tipe" class="w-full border p-2 rounded" required>
                <option value="benefit" {{ $kriteria->tipe == 'benefit' ? 'selected' : '' }}>Benefit</option>
                <option value="cost" {{ $kriteria->tipe == 'cost' ? 'selected' : '' }}>Cost</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection