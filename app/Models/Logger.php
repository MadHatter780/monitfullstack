<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Logger extends Model
{


    use HasFactory;

    // public $timestamps = false;
    public $table = 'logger';
    public $guarded = 'id';
}
