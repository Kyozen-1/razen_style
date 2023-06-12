<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;

    protected $table = 'tims';
    protected $guarded = 'id';

    public function pivot_tim_media_sosial()
    {
        return $this->hasMany('App\Models\PivotTimMediaSosial', 'tim_id');
    }
}
