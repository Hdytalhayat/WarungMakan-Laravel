<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'province',
        'postal',
        'status',
        'messege',
        'total_price',
        'tracking_no',
    ];

    public function Orderitem()
    {
        return $this->hasMany(Orderitem::class);
    }
}
