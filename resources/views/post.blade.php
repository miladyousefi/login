@extends('layouts.auth')

@section('content')
<div class="container" dir="rtl">
    <div class="jumbotron text-white rounded bg-info text-right">
      <div class="text-center">
        <h3 >
          {{ $post->title }}
        </h3>
      </div>
    </div>

    <div class="container-fluid text-right" dir="rtl"> 
        <div class="row">
            <main role="main" class="text-center align-self-center text-right">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                </div>
                <img  src="../../images/posts/{{$post->image}}" class="rounded m-5" width="700" height="400" alt="">
                    <p class="text-right">
                        {!! nl2br($post->body) !!}
                    </p>


            </main>
        </div>
    </div>
  </div>
  <script>
    Holder.addTheme('thumb', {
      bg: '#55595c',
      fg: '#eceeef',
      text: 'Thumbnail'
    });
  </script>
</body>
@endsection
