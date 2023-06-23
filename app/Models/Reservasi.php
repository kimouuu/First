<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $fillable = [
        'Nama',
        'Company_Name',
        'Phone',
        'Tanggal',
        'Name_Project',
        'Status',
    ];
}
