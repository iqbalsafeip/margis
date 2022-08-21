<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    public $table = 'areas';
    public $fillable = ['area_tugas'];
    public function fasilitasItem()
    {
        return $this->hasMany(FasilitasItem::class, 'area_id');
    }
}
