
@extends('layouts.app')

@section('content')

@foreach ($image as $imagen)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card  mb-5 ">
                <div class="card-header">
                    <?php $usuario = App\User::where('id',$imagen->user_id)->first()->image; ?>
                    <?php $usuario2 = App\User::where('id',$imagen->user_id)->first(); ?>

                    @if($usuario2->image != null)    
                            <img src="/storage/{{$usuario}}" height="75px" width="75px" class="avatar rounded-circle" alt="imagen-avatar">
                        <!--  Avatar por defecto en la ruta public/  -->
                        @else
                            <img src="{{asset("/avatar/avatar-default.gif")}}" height="75px" width="75px" class="avatar rounded-circle" alt="imagen-avatar">
                        @endif
                        @foreach ($perfiles as $perfil)
                            @if($perfil->id==$imagen->user_id)
                                {{$perfil->name}}
                                |
                                {{"@".$perfil->nick}}
                            @endif
                        @endforeach

                </div>
                <div class="card-body text-center d-flex justify-content-center mh-30">
                    <img class="mw-100 mh-100" src="/storage/{{$imagen->image_path}}" alt=""> 

                    {{--   @foreach ($comments as $comment)
                        <p>This is nick {{ $comment->user->nick }}</p>
                        @endforeach
                    --}}

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   {{--  <img src="{{route('user.show',['filename'=>Auth::user()->image])}}" alt="" class="avatar" width="100px" height="100px"> --}}
                   

                   <!-- <img src="/avatar/zaun_crest_icon.png" alt=""> -->
                </div>
                <div class="card-footer bg-white font-weight-bold">
                    @foreach ($perfiles as $perfil)
                    @if($perfil->id==$imagen->user_id)
                        {{"@".$perfil->nick}}
                        |
                        {{ FormatTime::LongTimeFilter($imagen->created_at) }} 
                        <br>
                        <div class="font-weight-normal">
                            {{$imagen->description}}
                        </div>
                    @endif
                @endforeach
                <hr>
                <!-- Corazon -->
                <div class="d-flex">
                {{$contador = App\Image::where('id',$imagen->id)->withCount('likes')->get()->first()->likes_count}}
                <?php $siono= App\Like::where('user_id',Auth::user()->id)->where('images_id',$imagen->id)->first() ?>
                @if($siono!="")
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill mt-1" color="red"fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                </svg>
                    <i>Te ha gustado</i>
                @else

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill mt-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                    <form method="GET" id="likeform" action="{{action('LikeController@like',['images_id'=>$imagen->id])}}" style="width='20%'">                   
                        <button class=" btn btn-danger ml-3" type="submit">like</button>
                    </form>
                
                @endif

                </div>
                <hr>
                  <form method="PUT" action="/image/{{$imagen->id}}" class="text-center">

                     <button type="submit" class="btn btn-info">Comentarios ({{$contador = App\Image::where('id',$imagen->id)->withCount('comments')->get()->first()->comments_count}})
                    </button>
                 </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
<div class="row justify-content-center">
    <div class="clearfix">
    {{$image->links()}}
    </div>
</div>

@endsection
