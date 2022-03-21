<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            [
                "namaPegawai" => "Aldi Dwi Kusuma",
                "jabatan" => "HRD",
                "alamat" => "Gresik",
                "noTelp" => "087704255655"
            ],
            [
                "namaPegawai" => "Aria Pratama Effendi",
                "jabatan" => "Manajer",
                "alamat" => "Bangkalan",
                "noTelp" => "081231527168"
            ],
            [
                "namaPegawai" => "Wazir Qorni Abud",
                "jabatan" => "Bendahara",
                "alamat" => "Lamongan",
                "noTelp" => "089530421926"
            ],
            [
                "namaPegawai" => "Syahrul Eka Pratama",
                "jabatan" => "Sekretaris",
                "alamat" => "Surabaya",
                "noTelp" => "085812616815"
            ]
        ]);
    }
}
