<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;  /* llamo al model categoria para poder mostrar las categorias en mi nav */

class Navigation extends Component
{
    public function render()
    {
        $categories = Category::all();   /* aqui declaro una variable dnd alamceno todo los registros de categorias con all(). */
        
        return view('livewire.navigation' , compact('categories'));  /* aqui se lo pasamos a la vista del componente con compact(). */
    }
}
