<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $fillable =[
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'menu_price',
        'delivery_days',
        'image',
        'model',
        'status',
    ];
    public function Categories(){
        return $this->belongsTo(Categories::class, 'cate_id','id');
    }
}
