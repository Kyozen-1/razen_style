<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageKontak extends Model
{
    use HasFactory;

    protected $table = 'landing_page_kontaks';
    protected $guarded = 'id';
}