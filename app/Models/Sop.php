<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    use HasFactory;
    protected $table = "sops";
    protected $fillable = [
        'nama_sop',
        'file_sop',
    ];
}
