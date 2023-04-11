<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'price',
        'image',
        'qty',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    public function Categories(){
        return $this->belongsTo(Categories::class, 'cate_id','id');
    }
}
