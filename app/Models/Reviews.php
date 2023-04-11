<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'menu_id',
        'reviews',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Ratings()
    {
        return $this->belongsTo(Ratings::class, 'user_id', 'user_id');
    }
    public function menu()
    {
        return $this->belongsTo(menu::class, 'menu_id', 'id');
    }
}
