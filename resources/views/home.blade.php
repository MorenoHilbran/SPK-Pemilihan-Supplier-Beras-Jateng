@extends('layouts.app')

@section('content')
    <!-- Section 1: Hero - Weighted Product Explanation -->
    <section class="py-12 bg-blue-50 mb-8">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-6">Sistem Pendukung Keputusan Pemilihan Pemasok Beras</h1>
                <p class="text-xl text-gray-600 mb-6">
                    Metode Weighted Product (WP) adalah salah satu metode dalam Sistem Pendukung Keputusan yang digunakan untuk menentukan alternatif terbaik dari sejumlah pilihan berdasarkan kriteria tertentu.
                </p>
                <p class="text-lg text-gray-600">
                    Aplikasi ini membantu menentukan daerah pemasok beras terbaik di Jawa Tengah dengan mempertimbangkan berbagai faktor kriteria menggunakan perhitungan matematis yang objektif.
                </p>
            </div>
        </div>
    </section>

    <!-- Section 2: Team Members -->
    <section class="py-12 mb-8">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Kelompok 2</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Member 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500 text-lg">Foto Anggota 1</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Nama Anggota 1</h3>
                        <p class="text-gray-600">NIM: 123456789</p>
                    </div>
                </div>
                
                <!-- Member 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500 text-lg">Foto Anggota 2</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Nama Anggota 2</h3>
                        <p class="text-gray-600">NIM: 123456789</p>
                    </div>
                </div>
                
                <!-- Member 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500 text-lg">Foto Anggota 3</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Nama Anggota 3</h3>
                        <p class="text-gray-600">NIM: 123456789</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Calculation Steps -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Langkah-langkah Penghitungan</h2>
            
            <div class="max-w-4xl mx-auto space-y-6">
                <!-- Step 1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">1. Menentukan Kriteria dan Bobot</h3>
                    <p class="text-gray-600">
                        Menetapkan kriteria penilaian yang relevan untuk pemilihan pemasok beras dan memberikan bobot pada setiap kriteria berdasarkan tingkat kepentingannya.
                    </p>
                </div>
                
                <!-- Step 2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">2. Normalisasi Bobot</h3>
                    <p class="text-gray-600">
                        Melakukan normalisasi bobot untuk setiap kriteria sehingga total bobot seluruh kriteria sama dengan 1.
                    </p>
                </div>
                
                <!-- Step 3 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">3. Menghitung Nilai Vektor S</h3>
                    <p class="text-gray-600">
                        Menghitung nilai vektor S untuk setiap alternatif dengan mengalikan nilai kriteria yang telah dipangkatkan dengan bobot kriteria yang sudah dinormalisasi.
                    </p>
                </div>
                
                <!-- Step 4 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">4. Menghitung Nilai Vektor V</h3>
                    <p class="text-gray-600">
                        Menghitung nilai vektor V dengan membagi nilai vektor S setiap alternatif dengan jumlah seluruh nilai vektor S.
                    </p>
                </div>
                
                <!-- Step 5 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">5. Perankingan</h3>
                    <p class="text-gray-600">
                        Melakukan perankingan berdasarkan nilai vektor V untuk menentukan alternatif terbaik sebagai pemasok beras di Jawa Tengah.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection