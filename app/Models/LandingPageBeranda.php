<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageBeranda extends Model
{
    use HasFactory;

    protected $table = 'landing_page_berandas';
    protected $guarded = 'id';
}
