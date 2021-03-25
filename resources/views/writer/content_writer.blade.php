@extends('layouts.auth')

@section('content')
    <div class="container-fluid text-right" dir="rtl"> 
        <div class="row">
            @include('writer.nav')

            <main role="main" class="text-center align-self-center col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 text-right">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h4 class="h2">{{$post->title}}</h4>
                 

                </div>
                <img  src="../../images/posts/{{$post->image}}" class="rounded m-5" width="700" height="400" alt="">
                    <p class="text-right">
                        {!! nl2br($post->body) !!}
                    </p>


            </main>
        </div>
    </div>

@endsection
