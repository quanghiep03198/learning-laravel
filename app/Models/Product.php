<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $connection = 'sqlsrv';

    protected $fillable = [
        'product_name',
        'product_price',
        'product_thumbnail',
        'product_category',
        'slug',
        'is_draft',
        'is_published'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['product_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
