<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity', 'user_id'];

    public function order()
    {
        $this->belongsTo(Order::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }
}
