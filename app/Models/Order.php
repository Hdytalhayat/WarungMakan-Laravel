<?php

namespace App\Models;

use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'status',
        'total_price',
        'tracking_no',
    ];

    public function Orderitem()
    {
        return $this->hasMany(Orderitem::class);
    }
}
