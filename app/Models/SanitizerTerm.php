<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanitizerTerm extends Model
{
    protected $table = 'sanitizer_dictionary';

    protected $fillable = ['term', 'reason'];
}
