<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'payed_at',
        'order_id'
    ];

    protected $dates = [
        'payed_at',
    ];

    public function order()
    {
        //relacion de pertenecia con orden
        return $this->belongsTo(Order::class);
    }
}
