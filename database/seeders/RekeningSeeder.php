<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rekening')->insert([
            'rekening' => '1.20.1.20.03.01.01',
            'rekening_dua' => '5.2.2.01.04',
            'uraian' => 'Penyediaan jasa surat menyurat'
        ]);

        DB::table('rekening')->insert([
            'rekening' => '1.20.1.20.03.01.10',
            'rekening_dua' => '5.2.2.01.01.',
            'uraian' => 'Penyediaan alat tulis kantor'
        ]);

        DB::table('rekening')->insert([
            'rekening' => '1.20.1.20.03.01.11',
            'rekening_dua' => '5.2.2.06.01',
            'uraian' => 'Penyediaan Barang Cetakan dan Penggandaan'
        ]);

        DB::table('rekening')->insert([
            'rekening' => '1.20.1.20.03.16.09',
            'rekening_dua' => '5.2.2.01.01',
            'uraian' => 'Penyusunan Pelaporan Realisasi Anggaran'
        ]);

        DB::table('rekening')->insert([
            'rekening' => '1.20.1.20.03.16.10',
            'rekening_dua' => '5.2.2.01.01',
            'uraian' => 'Pengendalian dan Evaluasi Pembangunan'
        ]);

        DB::table('rekening')->insert([
            'rekening' => '1.20.1.20.03.20.03',
            'rekening_dua' => '5.2.2.01.01',
            'uraian' => 'Pengendalian manajemen pelaksanaan kebijakan KDH'
        ]);

       
        DB::table('rekening')->insert([
            'rekening' => '1.20.1.20.03.20.11',
            'rekening_dua' => '5.2.2.01.01',
            'uraian' => 'Pengumpulan dan pengolahan data serta penyusunan program'
        ]);

        DB::table('rekening')->insert([
            'rekening' => '1.20.1.20.03.20.14',
            'rekening_dua' => '5.2.2.01.01',
            'uraian' => 'Unit layanan pengadaan kabupaten karangasem'
        ]);

        DB::table('rekening')->insert([
            'rekening' => '1.20.1.20.03.05.02',
            'rekening_dua' => '5.2.2.05.01',
            'uraian' => 'Pemeliharaan Rutin/berkala kendaraan dinas/oprasional'
        ]);
    }
}
