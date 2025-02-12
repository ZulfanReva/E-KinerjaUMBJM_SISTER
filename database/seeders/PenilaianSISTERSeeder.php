<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penilaian_sister')->insert([
            [
                'dosen_id' => 35,
                'periode_id' => 1,
                'bidang_pendidikan' => 3,
                'bidang_penelitian' => 2,
                'bidang_pengabdian' => 2,
                'bidang_penunjang' => 2,
                'total_nilai' => 4.62
            ],
            [
                'dosen_id' => 36,
                'periode_id' => 1,
                'bidang_pendidikan' => 3,
                'bidang_penelitian' => 3,
                'bidang_pengabdian' => 2,
                'bidang_penunjang' => 3,
                'total_nilai' => 4.88
            ],
            [
                'dosen_id' => 37,
                'periode_id' => 1,
                'bidang_pendidikan' => 2,
                'bidang_penelitian' => 3,
                'bidang_pengabdian' => 3,
                'bidang_penunjang' => 2,
                'total_nilai' => 4.73
            ],
            [
                'dosen_id' => 38,
                'periode_id' => 1,
                'bidang_pendidikan' => 3,
                'bidang_penelitian' => 2,
                'bidang_pengabdian' => 2,
                'bidang_penunjang' => 3,
                'total_nilai' => 4.77
            ],
            [
                'dosen_id' => 39,
                'periode_id' => 1,
                'bidang_pendidikan' => 3,
                'bidang_penelitian' => 2,
                'bidang_pengabdian' => 2,
                'bidang_penunjang' => 2,
                'total_nilai' => 4.62
            ],
            [
                'dosen_id' => 41,
                'periode_id' => 1,
                'bidang_pendidikan' => 2,
                'bidang_penelitian' => 2,
                'bidang_pengabdian' => 2,
                'bidang_penunjang' => 2,
                'total_nilai' => 4.5
            ]
        ]);
    }
}
