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
});

Route::get('/table/{table}/detail/{keyid}', function ($table, $keyid) {
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