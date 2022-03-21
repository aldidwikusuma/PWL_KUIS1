<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "pelanggans";
    protected $primaryKey = 'id';
    protected $fillable = [
        'namaPelanggan',
        'alamat',
        'noTelp',
        'email',
    ];
}
