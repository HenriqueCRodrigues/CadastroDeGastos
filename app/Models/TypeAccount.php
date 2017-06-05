<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeAccount extends Model
{
     protected $table = 'type_accounts';


     public function accounts()
    {
          return $this->hasMany(Account::class);
    }

}
