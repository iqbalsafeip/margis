<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'fasilitas_id',
        'room_id',
        'area_id',
        'jumlah',
    ];
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }
    public function room()
    {
        return  $this->belongsTo(Room::class, 'room_id');
    }
    public function area()
    {
        return  $this->belongsTo(Area::class, 'area_id');
    }
}
