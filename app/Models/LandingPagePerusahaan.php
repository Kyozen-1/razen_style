<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPagePerusahaan extends Model
{
    use HasFactory;
    protected $table = 'landing_page_perusahaans';
    protected $guarded = 'id';
}
