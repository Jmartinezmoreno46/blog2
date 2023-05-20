<x-app-layout>

    @vite('resources/css/stylepropios.css')

    <div class="container py-8">  {{-- para centrar en css se utiliza ml-auto mr-auto --}}
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($posts as $post)  {{-- @if($loop->first) col-span-2 @endif , hacemos una condicion para que el primer objecto ocupe 2 posiciones  --}}
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) lg:col-span-2 @endif" style="background-image: url({{Storage::url($post->image->url)}}) ">
                    <div class="w-fulll h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{route('posts.tag' , $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white roundef-full">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{route('posts.show' , $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>
                
            @endforeach

        </div class="mt-4">
            {{$posts->links()}} {{-- con esto llamamos a la paginacion de la pagina  --}}
        <div>

        </div>
    </div>

</x-app-layout>