<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama','tmp_lahir','tgl_lahir','gender','email','alamt','kecamatan_nama'];
}
