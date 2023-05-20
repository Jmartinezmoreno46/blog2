<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index' ,  compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       /*  aqui le damos regla de validacion cuando queremos guardar en la base de datos. */

       $request->validate([
           'name' => 'required',
           'slug' => 'required|unique:categories'  /* aqui le decimos que el campo es requerido , va hacer unico 
                                                    y le especificamos la tabla donde queremos que sea unico
                                                    en este caso la tabla categories. */
        ]);


        /* para hacer un registro hacemos lo siguiente aqui llamamos al modelo category ,
         luego le pasamos el metodo create y le pasamos lo que hemos mandado. */

        $category = Category::create($request->all());  


        /* aqui le pasamos a la ruta que queremos redireccionar  */

        return redirect()->route('admin.categories.edit' ,$category)->with('info' , 'La categoria se creo con exito'); ; 
                                                                    

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show' , compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit' , compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'  /* aqui le decimos que el campo es requerido , va hacer unico 
                                                     y le especificamos la tabla donde queremos que sea unico
                                                     en este caso la tabla categories. */
         ]);

         $category->update($request->all());

         /* con with mostramos un alert con un mensaje */
         return redirect()->route('admin.categories.edit' ,$category)->with('info' , 'La categoria se actualizo con exito'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)  /* le decimos que estas variables por convencion a las rutas de laravel van hacer de tipo Category */
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('info' , 'La categoria se elimino con exito'); ;
    }
}
