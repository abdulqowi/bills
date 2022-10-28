<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billDetail extends Model
{
    protected $guarded = [];

    public function bill(){
        return $this-> belongsTo(bill::class);
    }

    public function user(){
        return $this-> belongsTo(user::class);
    }
}
