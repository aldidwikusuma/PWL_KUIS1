<?php

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard', [
        "title" => "Dashboard",
        "countdatatable" => [
            "barang" => DB::table("barangs")->count(),
            "supplier" => DB::table("suppliers")->count(),
        ]
    ]);
});

Route::get('/table/{table}', function ($table) {
    $tablename = ["barang", "supplier"];
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
        default:
            
            break;
    }

    // Cek request dari input
    $datatable = [];
    if (request("key")) {
        $datatable = DB::table(ucfirst($table) . "s")->where("name", "like", "%" . request("key") . "%");
    } else {
        $datatable = DB::table(ucfirst($table) . "s");
    }

    return view('table', [
        "title" => "Table " . ucfirst($table),
        "titleheader" => "Table of " . ucfirst($table),
        "table" => [
            "url" => $table,
            "title" => $titletable,
            "total" => $datatable->count(),
            "data" => $datatable->paginate(15)
        ]
    ]);
});

Route::get('/table/{table}/detail/{keyid}', function ($table, $keyid) {
    $tablename = ["barang", "supplier"];
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
});

Route::get('/table/{table}/ajax', function ($table) {
    $datatable = DB::table(ucfirst($table) . "s")->where("name", "like", "%" . request("data") . "%");
    return view("search", [
        "table" => [
            "url" => $table,
            "data" => $datatable->get(),
            "total" => $datatable->count(),
        ]
    ]);
})->name("search");