<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaTugasItem extends Model
{
    use HasFactory;
    protected $table = 'area_tugas_item';
    protected $fillable = [
        'area_id',
        'schedule_id'
    ];
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
    public function schedules()
    {
        return  $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
