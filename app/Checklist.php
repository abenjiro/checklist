<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    //
    public function checklist()
    {
    	return $this->belongsTo(User::class);
    }
}
