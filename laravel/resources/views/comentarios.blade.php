@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card  mb-5 ">
                <div class="card-header">

                    @if(Auth::user()->image != "")

                            <img src="/storage/{{Auth::user()->image}}" height="75px" width="75px" class="avatar rounded-circle" alt="imagen-avatar">

                        @else
                            <img src="{{asset("/avatar/avatar-default.gif")}}" height="75px" width="75px" class="avatar rounded-circle" alt="imagen-avatar">
                        @endif
                        {{$nick}}
                </div>
                <div class="card-body text-center">
                    <img src="/storage/{{$image->image_path}}" alt="" class="mw-100"> 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-footer font-weight-bold">

                    {{"@".$nick}}
                    |
                    {{ FormatTime::LongTimeFilter($image->created_at) }} 
                    <br>
                    <div class="font-weight-normal">
                        {{$image->description}}
                    </div>

                    @if($image->user_id == Auth::user()->id)
                    <!-- BOTON UPDATE FOTO-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalUpdate">
                        Actualizar
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalUpdate" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalUpdate">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="{{action('ImageController@update',['id'=>$image->id])}}" enctype="multipart/form-data">
                                @csrf
                                <!-- IMAGEN -->
                                <div class="form-group row">
                                    <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Nueva imagen:') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="imagen" type="file" class="@error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen') }}" required> 
                                                                                                                                
                                        @error('imagen')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Guardar datos') }}
                                    </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>

                    
                    <!-- BOTON ELIMINAR FOTO -- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Eliminar
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            ¿Seguro que desea borrar la imagen?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                            <a class="btn btn-danger" href="/image/delete/{{$image->id}}">Eliminar</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif

                    <h3 class="mt-3">Comentarios ({{$contador->comments_count}})<h3>
                    <hr>
                    <!-- ENVIAR COMENTARIO -->
                    <form method="GET" class="d-flex flex-column" action="{{action('CommentController@save',['id_imagen'=>$image->id])}}">
                        <textarea class="mb-3" name="comentario" id="comentario" cols="45" rows="3" required></textarea>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </form>
                    <hr>


                   @foreach ($comentarios as $comentario)
                   @if($comentario->images_id==$image->id)
                    {{$comentario->content}} <br> 
                    @if($comentario->user_id == Auth::user()->id)
                     <!-- ELIMINAR COMENTARIO -->
                    <form method="GET" action="{{action('CommentController@destroy',['id'=>$comentario->id,'id_imagen'=>$image->id])}}">
                        <button type="submit" class="btn btn-danger">Eliminar comentario</button> <br>
                    </form>
                    @endif
                    <hr>
                    @endif
                    @endforeach
                   
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
