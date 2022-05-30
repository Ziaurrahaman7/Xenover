<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitesetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'favicon',
        'phone',
        'email',
        'address',
        'facebook',
        'youtube',
        'linkdin',
        'whatsapp',
        'map',
        'copyright',
    ];
}
