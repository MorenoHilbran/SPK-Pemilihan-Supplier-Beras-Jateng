<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class AnalisaController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        // Normalisasi bobot
        $totalBobot = $kriterias->sum('bobot');
        $bobotNormalized = $kriterias->mapWithKeys(function ($item) use ($totalBobot) {
            return [$item->id => $item->bobot / $totalBobot];
        });

        // Simpan data normalisasi untuk ditampilkan
        $normalisasi = [];

        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $kriteria) {
                $col = 'nilai_k' . ($kriteria->id - 4);
                $val = $alt->$col;

                // Jika ingin tampilkan normalisasi (bukan untuk WP, hanya untuk laporan)
                $normalisasi[$alt->id][$col] = $val; // sudah skor 1–4, tak perlu dinormalisasi
            }
        }

        // Hitung nilai S
        $nilaiS = [];
        foreach ($alternatifs as $alt) {
            $product = 1;
            foreach ($kriterias as $kriteria) {
                $col = 'nilai_k' . ($kriteria->id - 4);
                $bobot = $bobotNormalized[$kriteria->id];
                $val = $alt->$col;

                $product *= ($kriteria->tipe == 'cost')
                    ? pow($val, -$bobot)
                    : pow($val, $bobot);
            }
            $nilaiS[$alt->id] = $product;
        }

        // Hitung nilai V
        $totalS = array_sum($nilaiS);
        $nilaiV = [];
        foreach ($nilaiS as $id => $s) {
            $nilaiV[$id] = $s / $totalS;
        }

        // Gabungkan hasil akhir
        $hasil = $alternatifs->map(function ($alt) use ($nilaiS, $nilaiV) {
            return [
                'nama' => $alt->nama_alternatif,
                'nilai_s' => $nilaiS[$alt->id],
                'nilai_v' => $nilaiV[$alt->id],
            ];
        })->sortByDesc('nilai_v')->values();

        return view('analisa', [
            'alternatifs' => $alternatifs,
            'kriterias' => $kriterias,
            'normalisasi' => $normalisasi,
            'bobotNormalized' => $bobotNormalized,
            'hasil' => $hasil
        ]);
    }
}
