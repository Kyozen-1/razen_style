<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotTimMediaSosial extends Model
{
    use HasFactory;

    protected $table = 'pivot_tim_media_sosials';
    protected $guarded = 'id';

    public function tim()
    {
        return $this->belongsTo('App\Models\Tim', 'tim_id');
    }

    public function media_sosial()
    {
        return $this->belongsTo('App\Models\MasterMediaSosial', 'media_sosial_id');
    }
}
