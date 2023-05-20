<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    /* hablitamos la asignacion masiva con fillable , para agregar a nuestra base de dato
    abrimos un arry y decimos los campos que se pueden ingresar */
    protected $fillable = ['name' , 'slug'];  

    public function getRouteKeyName(): string
{
    return 'slug';
}

    public function posts(){
        return $this->hasMany(Post::class);
    }

   /*  con esto hacemos que en vez de mostrar el id en la ruta de dirrecion nos muestre el slug */
    
}
