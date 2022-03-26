<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'customer_id'
    ];

    public function payment()
    {
        //relacion 1:1 con el modelo de payment
        return $this->hasOne(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
