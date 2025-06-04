@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Perhitungan Weighted Product (WP)</h1>

        @if(isset($error))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $error }}
            </div>
        @else
            <!-- Tabel Matriks Alternatif-Kriteria -->
            <h2 class="text-xl font-semibold mb-4">Matriks Alternatif-Kriteria</h2>
            <p class="mb-2 text-gray-600">Catatan: Data sudah dalam skala 1-5, sehingga nilai awal dan skala sama.</p>
            <table class="min-w-full bg-white border mb-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border" rowspan="2">Alternatif</th>
                        <th class="py-2 px-4 border" colspan="4">Skala (1-5)</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Harga</th>
                        <th class="py-2 px-4 border">Kualitas</th>
                        <th class="py-2 px-4 border">Jarak</th>
                        <th class="py-2 px-4 border">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($matriks) && isset($matriks[0]['nama_alternatif']) && $matriks[0]['nama_alternatif'] !== 'Tidak ada data')
                        @foreach($matriks as $row)
                            <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-50' : '' }}">
                                <td class="py-2 px-4 border">{{ $row['nama_alternatif'] }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['skala']['Harga'], 0) }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['skala']['Kualitas'], 0) }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['skala']['Jarak'], 0) }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['skala']['Waktu'], 0) }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="5" class="py-2 px-4 border text-center">Tidak ada data untuk ditampilkan.</td></tr>
                    @endif
                </tbody>
            </table>

            <!-- Tabel Perhitungan Bobot Kepentingan -->
            <h2 class="text-xl font-semibold mb-4">Perhitungan Bobot Kepentingan</h2>
            <table class="min-w-full bg-white border mb-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Kriteria</th>
                        <th class="py-2 px-4 border">Bobot (Wi)</th>
                        <th class="py-2 px-4 border">Bobot Ternormalisasi (Ci)</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($bobotKepentingan))
                        @foreach($bobotKepentingan as $row)
                            <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-50' : '' }}">
                                <td class="py-2 px-4 border">{{ $row['nama_kriteria'] }}</td>
                                <td class="py-2 px-4 border text-right">{{ $row['bobot'] }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['normalisasi'], 4) }}</td>
                            </tr>
                        @endforeach
                        <tr class="bg-gray-100 font-semibold">
                            <td class="py-2 px-4 border">Total</td>
                            <td class="py-2 px-4 border text-right">{{ $bobotKepentingan->sum('bobot') }}</td>
                            <td class="py-2 px-4 border text-right">{{ number_format($bobotKepentingan->sum('normalisasi'), 4) }}</td>
                        </tr>
                    @else
                        <tr><td colspan="3" class="py-2 px-4 border text-center">Tidak ada data untuk ditampilkan.</td></tr>
                    @endif
                </tbody>
            </table>

            <!-- Tabel Perhitungan Pangkat -->
            <h2 class="text-xl font-semibold mb-4">Perhitungan Pangkat</h2>
            <table class="min-w-full bg-white border mb-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Kriteria</th>
                        <th class="py-2 px-4 border">Tipe</th>
                        <th class="py-2 px-4 border">Bobot Normal</th>
                        <th class="py-2 px-4 border">Pangkat</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($pangkatData))
                        @foreach($pangkatData as $row)
                            <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-50' : '' }}">
                                <td class="py-2 px-4 border">{{ $row['nama_kriteria'] }}</td>
                                <td class="py-2 px-4 border">{{ $row['tipe'] }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['bobot_normal'], 4) }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['pangkat'], 4) }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="4" class="py-2 px-4 border text-center">Tidak ada data untuk ditampilkan.</td></tr>
                    @endif
                </tbody>
            </table>

            <!-- Tabel Perhitungan Nilai S -->
            <h2 class="text-xl font-semibold mb-4">Perhitungan Nilai S</h2>
            <table class="min-w-full bg-white border mb-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Alternatif</th>
                        <th class="py-2 px-4 border">Harga</th>
                        <th class="py-2 px-4 border">Kualitas</th>
                        <th class="py-2 px-4 border">Jarak</th>
                        <th class="py-2 px-4 border">Waktu</th>
                        <th class="py-2 px-4 border">Skor S</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($nilaiSData))
                        @foreach($nilaiSData as $row)
                            <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-50' : '' }}">
                                <td class="py-2 px-4 border">{{ $row['nama_alternatif'] }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['komponen'][0], 10) }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['komponen'][1], 10) }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['komponen'][2], 10) }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['komponen'][3], 10) }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($row['skor'], 10) }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="6" class="py-2 px-4 border text-center">Tidak ada data untuk ditampilkan.</td></tr>
                    @endif
                </tbody>
            </table>

            <!-- Tabel Hasil Akhir -->
            <h2 class="text-xl font-semibold mb-4">Hasil Akhir</h2>
            <table class="min-w-full bg-white border mb-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Ranking</th>
                        <th class="py-2 px-4 border">Alternatif</th>
                        <th class="py-2 px-4 border">Skor (S)</th>
                        <th class="py-2 px-4 border">Preferensi (V)</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($hasil))
                        @foreach($hasil as $index => $item)
                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : '' }}">
                                <td class="py-2 px-4 border text-center">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border">{{ $item['nama_alternatif'] }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($item['skor'], 10) }}</td>
                                <td class="py-2 px-4 border text-right">{{ number_format($item['preferensi'], 10) }}</td>
                            </tr>
                        @endforeach
                        <tr class="bg-gray-100 font-semibold">
                            <td class="py-2 px-4 border" colspan="2">Total</td>
                            <td class="py-2 px-4 border text-right">{{ number_format($hasil->sum('skor'), 10) }}</td>
                            <td class="py-2 px-4 border text-right">{{ number_format($hasil->sum('preferensi'), 10) }}</td>
                        </tr>
                    @else
                        <tr><td colspan="4" class="py-2 px-4 border text-center">Tidak ada data untuk ditampilkan.</td></tr>
                    @endif
                </tbody>
            </table>

            <!-- Kesimpulan Ranking -->
            <h2 class="text-xl font-semibold mb-4">Kesimpulan Ranking</h2>
            @if(!empty($hasil))
                <p class="mb-4">Berdasarkan perhitungan Weighted Product, ranking alternatif dari tertinggi ke terendah adalah sebagai berikut:</p>
                <ol class="list-decimal pl-6 mb-4">
                    @foreach($hasil as $index => $item)
                        <li>{{ $item['nama_alternatif'] }} (Preferensi V = {{ number_format($item['preferensi'], 6) }})</li>
                    @endforeach
                </ol>
                <p class="text-gray-600">Tanggal Perhitungan: {{ now()->format('d M Y H:i') }} WIB</p>
            @else
                <p class="mb-4 text-gray-600">Tidak ada data untuk ditampilkan.</p>
            @endif
        @endif

        <div class="mt-6">
            <a href="{{ route('alternatif.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kembali ke Alternatif</a>
        </div>
    </div>
@endsection