<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home()
    {
        return view('dashboard', [
            "title" => "Dashboard",
            "countdatatable" => [
                "barang" => DB::table("barangs")->count(),
                "supplier" => DB::table("suppliers")->count(),
                "pegawai" => DB::table("pegawais")->count(),
                "pelanggan" => DB::table("pelanggans")->count(),
            ]
        ]);
    }

    public function table($table)
    {
        $tablename = ["barang", "supplier","pegawai","pelanggan"];
        if (!in_array($table, $tablename)) {
            return view("errors.404");
        }
        $titletable = [];
        switch ($table) {
            case "barang":
                $titletable = ["Nama Barang", "Image Barang", "Stok Barang", "Harga Barang"];
                break;
            case "supplier":
                $titletable = ["Nama", "Image", "NIK", "Phone Number"];
                break;
            case "pegawai":
                $titletable = ["Nama Pegawai", "Jabatan", "Alamat", "No Telepon"];
                break;
            case "pelanggan":
                $titletable = ["Nama Pelanggan", "Alamat", "No Telepon", "Email"];
                break;
            default:
                
                break;
        }
        return view('table', [
            "title" => "Table " . ucfirst($table),
            "titleheader" => "Table of " . ucfirst($table),
            "table" => [
                "url" => $table,
                "total" => DB::table(ucfirst($table) . "s")->count(),
                "title" => $titletable,
                "data" => DB::table(ucfirst($table) . "s")->paginate(15)
            ]
        ]);
    }

    public function detail($table, $keyid)
    {
        $tablename = ["barang", "supplier","pegawai","pelanggan"];
        if (!in_array($table, $tablename) || DB::table(ucfirst($table) . "s")->where("id", $keyid)->count() == 0) {
            return view("errors.404");
        }
        $titledesc = [];
        switch ($table) {
            case "barang":
                $titledesc = ["Name", "Desc" , "Stok", "Price"];
                break;
            case "supplier":
                $titledesc = ["Name", "NIK", "Phone Number", "Address"];
                break;
            case "pegawai":
                $titledesc = ["Nama", "Jabatan", "Alamat", "No Telepon"];
                break;
            case "pelanggan":
                $titledesc = ["Nama", "Alamat", "No Telepon", "Email"];
                break;
            default:
                break;
        }
        return view('detail', [
            "title" => "Detail Data",
            "datadetail" => [
                "tableurl" => $table,
                "titledata" => $titledesc,
                "data" => DB::table(ucfirst($table) . "s")->where("id", $keyid)->first(),
            ]
        ]);
    }
}
