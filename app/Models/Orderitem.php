<?php

namespace App\Models;

use App\Models\menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderitem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'menu_id',
        'qty',
        'price',
    ];

    public function menu()
    {
        return $this->belongsTo(menu::class, 'menu_id', 'id');
    }
}
