@extends('adminlte::page')

@section('title', 'Curso Laravel')

@section('content_header')
    <h1>Editar Categorias</h1>
@stop

@section('content')

    @if (session('info'))  {{-- aqui recibimos el alert que mandamos por la route , para lo cual 
                            preguntaremos si existe un mensaje de session. --}}
        <div class="alert alert-success">
            <strong>{{ session('info')}} </strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            {!! Form::model( $category , ['route' => ['admin.categories.update' , $category], 'method' => 'put']) !!}  {{-- utilizamos el formulario collective de la siguiente manera Form::open --}}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' => 'Ingrese el Nombre De la Categoria']) !!}
                    
                    {{-- aqui incluimos los posibles errores de validacion --}}

                    @error('name')
                        <span class="text-danger">{{$message}} </span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control' , 'placeholder' => 'Ingrese el Slug De la Ctegoria' , 'readonly']) !!}
                
                    {{-- aqui incluimos los posibles errores de validacion --}}

                    @error('slug')
                        <span class="text-danger">{{$message}} </span>
                    @enderror
                </div>

                {!! Form::submit('Actualizar Categoria', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}} "></script> 

    {{-- descargamos este plugin slug que nos va a servir para que rellene nuestro campo slug de forma automatica
    aqui le pasamos la ruta dnd se encuentra . este archivo es descargado y copiado dentro de la carpeta 
    public/vendor. --}}

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({   /* aqui indicamos que input quiere que escuche  $("#name") es nuestro input name */
                setEvents: 'keyup keydown blur',
                getPut: '#slug', /* y aqui le decimos que lo pegue en el input $slug */
                space: '-'
            });
            });

            /* este codigo lo encontramos en la documentacion del plugin slog ,lo que hicimos fue abrir un 
            script y pegar el codigo, y cambiar que input debemos llamar  */
    </script>
    
@endsection