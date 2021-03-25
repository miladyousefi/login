@extends('layouts.auth')

@section('content')
<div class="container" dir="rtl">
  <form method="post">
    @csrf
    <div class="input-group mb-3 col-md-4">
      
      <input type="text" name="key" class="form-control" placeholder="جستوجو در مطالب">
      <div class="input-group-append text-right">
        <button type="submit" class="btn btn-primary" style="display: none">جستوجو</button>
      </div>
    </div>
    
  </form>
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-info text-right">
      <div class="col-md-12 px-0">
        <h2 class="">
          @if($last)
            {{ $last->title }}
          @else
            {{ "چیزی ثبت نشده هنوز!!" }}
          @endif 
        </h2>
        <p class="lead my-3">@if($last){{ Str::limit($last->body, 180, '...')}} @else {{ "چیزی ثبت نشده هنوز!!" }}@endif </p>
        <p class="lead mb-0"><a href="@if($last){{ route('post',$last->id) }} @else {{ "#" }} @endif" class="text-white font-weight-bold btn btn-outline-danger">مشاهده</a></p>
      </div>
    </div>

    <div class="row mb-2">
      @if(empty($posts))
      <p>نتیجه ای پیدا نشد !!</p>
        
      @endif
      @if($last)
      @foreach ($posts as $post)
      <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary"> وبلاگ</strong>
            <h3 class="mb-0">
              <h5 class="text-dark text-dark" href="#">{{ Str::limit($post->title, 30, '...')}}</h5>
            </h3>
            <div class="mb-1 text-muted">{{ $post->created_at }}</div>
            <p class="card-text mb-auto text-right">{{ Str::limit($post->body, 50, '...')}}</p>
            <a href="{{ route('post',$post->id) }}" class="btn btn-outline-danger">مشاهده</a>
          </div>
          <img src="/images/posts/{{ $post->image }}"class="card-img-right flex-auto d-none d-md-block"  alt="Card image cap" height="200" width="250">
        </div>
      </div>
      @endforeach
      @else {{ "#" }} @endif
      
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
