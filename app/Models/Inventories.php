<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventories extends Model
{
    use HasFactory;
    // Especificamos los campos que pueden ser asignados
    protected $fillable = [
        'id_product',
        'id_category',
        'code',
        'name',
        'description_short',
        'description_large',
        'colors',
        'purchase_price',
        'sale_price',
        'motivo',
        'quantity',    
    ];

    protected $guarded = []; // Para poder usar el método create de Eloquent
    // Relación uno a muchos con la tabla products
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
