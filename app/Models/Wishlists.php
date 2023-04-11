<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    use HasFactory;
    protected $table = 'Wishlists';
    protected $fillable = [
        'user_id',
        'menu_id',
    ];
    public function menu(){
        return $this->belongsTo(menu::class,'menu_id', 'id');
    }
}
