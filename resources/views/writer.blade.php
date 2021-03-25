@extends('layouts.auth')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row">
          @include('writer.nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                   
                  @include('layouts.notification')
                  <h3 class="text-center">لسیت نوشته ها</h3>

                  @if(isset($writer))
                    <a href="{{$writer['instagram']}}" class="btn btn-outline-danger">
                        <span class="fa fa-instagram">
                            
                        </span>
                    </a>
                    <a href="{{$writer['telegram']}}" class="btn btn-outline-primary">
                        <span class="fa fa-telegram"></span>
                    </a>
                    
                  @endif

                    <div class="btn-toolbar mb-2 mb-md-0">

                        <div class="btn-group mr-2" dir="ltr">
                            <a class="btn btn-success" href="{{route('add.post')}}">+ ثبت مطلب جدید</a>
                        </div>

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-primary table-bordered table-hover table-sm text-center ">
                        <thead>
                        <tr>
                            <th>شماره </th>
                            <th>عنوان</th>
                            <th>تاریخ انتشار</th>
                            <th>عکس</th>
                            <th>مشاهده</th>
                            <th>حذف مطلب</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                <td><img src="/images/posts/{{$post->image}}" class="rounded" width="50" height="50" alt=""></td>
                                <td><a href="{{route('content.writer',$post->id)}}" class="btn btn-warning">مشاهده</a></td>
                                <td><a href="{{route('delete.post.writer',$post->id)}}" class="btn btn-outline-danger">حذف <span class="fa fa-trash-o"></span></a></td>


                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

@endsection
