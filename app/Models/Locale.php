<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use HasFactory;

    protected $fillable = ['locale'];

    protected $table = 'locales';

    protected $hidden = ['created_at','updated_at',];
}
