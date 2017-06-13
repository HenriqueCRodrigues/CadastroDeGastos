<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = ['of_user', 'name_bank', 'agency', 'number', 'type_account_id'];

    public function typeAccount()
    {
    	return $this->belongsTo(TypeAccount::class);
    }



}
