<?php   /* para la pagina admin , generamos este archivo admin.php para manejar nuestro panel administraitvo */
            /* desde aqui definimos las rutasque va a tener nuestro administrador */

            /* hay que especificar nuestro archivo admin , como un archivo de rutas , para eso lo definimos
            en nuestro archivo RouteServiceProvider.php y lo definimos dentro de su metodo boot */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;  /* aqui llamamos a los controladores */

Route::get('', [HomeController::class, 'index'])->name('admin.home');

/* la ruta que nos genera un crud es de tipo resource
para generar un crud tenemos que hacer un controlador primero ,para eso abrimos la terminal y ejecutamos
el siguiente comando php artisan make:controller nombreController -r */

Route::resource('categories', CategoryController::class)->names('admin.categories');