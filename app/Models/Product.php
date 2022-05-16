<?php

namespace App\Models;

use App\Models\Category;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;


    protected $fillable = ['name', 'description', 'price', 'category_id'];



    //const SEARCHABLE_FIELDS = ['name', 'decription', 'price'];

    public function toSearchableArray()
    {
      //  return $this->only(attributes self::SEARCHABLE_FIELDS);
      return  [
        'name' => $this->name,
        'description' => $this->description,
        'price' => $this->price,
        'category_name' => $this->category->name,
        'redirect' => "/products/$this->id/edit"

         
         
      ];
    }

    //query scope
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? null,  function ($query, $search) {
            $query->where('name', 'LIKE', '%'.$search .'%')
                ->orwhere('description', 'LIKE', '%' .  $search .  '%')
                ->orwhere('price', 'LIKE', '%' .  $search .  '%')
                ->orwhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' .  $search .  '%');
                });
        });
    }



    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
