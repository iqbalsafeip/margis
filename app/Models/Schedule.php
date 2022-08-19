<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'periode',
        'officer_id'
    ];
    public function areaTugasItem()
    {
        return $this->hasMany(AreaTugasItem::class, 'schedule_id');
    }
    public function officers()
    {
        return $this->belongsTo(Officer::class, 'officer_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'schedule');
    }
}
