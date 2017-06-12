<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Economy extends Model
{
   protected $table = 'economy';

   protected $fillable = ['of_user', 'desc', 'value'];
}
