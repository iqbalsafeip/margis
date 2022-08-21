<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_ruangan',
        'foto_ruangan',
        'petugas',
        'tipe'
    ];
    public function fasilitasItem()
    {
        return $this->hasMany(FasilitasItem::class, 'room_id');
    }
}
