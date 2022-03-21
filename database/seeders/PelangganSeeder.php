<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
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
                "namaPelanggan" => "Arva Bayu Susanto",
                "alamat" => "Gresik",
                "noTelp" => "085293438943",
                "email" => "HRD"
            ],
            [
                "namaPelanggan" => "Muhammad Zaidan Fikri",
                "alamat" => "Sidoarjo",
                "noTelp" => "083435544456",
                "email" => "HRD"
            ],
            [
                "namaPelanggan" => "Aditya Raihan Setyoputra",
                "alamat" => "Pandaan",
                "noTelp" => "088973737374",
                "email" => "HRD"
            ],
            [
                "namaPelanggan" => "Moh Nanang Roni",
                "alamat" => "Bangkalan",
                "noTelp" => "085399827044",
                "email" => "HRD"
            ]
        ]);
    }
}
