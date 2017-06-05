<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $fillable = ['name', 'date', 'account_id', 'user_id', 'value', 'contact_id'];

    public function account()
    {
      return $this->belongsTo(Account::class); 
    }

    public function contact()
    {
      return $this->belongsTo(Contact::class); 
    }
 
}
