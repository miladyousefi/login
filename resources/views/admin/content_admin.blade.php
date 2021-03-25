@extends('layouts.auth')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row">
            @include('admin.nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">لیست نوشته ها</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">


                    </div>
                </div>
                @include('layouts.notification')
                <div class="table-responsive">
                    <table class="table table-striped table-sm text-center">
                        <thead>
                        <tr>
                            <th>شماره </th>
                            <th>عنوان</th>
                            <th>تاریخ انتشار</th>
                            <th>عکس</th>
                            <th>نویسنده</th>
                            <th>مشاهده</th>
                            <th>حذف نوشته</th>



                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                <td><img src="/images/posts/{{$post->image}}" class="rounded" width="50" height="50" alt=""></td>
                                <td>
                                    {{App\Models\Writer::findOrfail($post->writer_id)->name}}
                                </td>
                                <td><a href="{{route('post',$post->id)}}" class="btn btn-warning">مشاهده</a></td>
                                <td><a href="{{route('delete.content.writer',$post->id)}}" class="btn btn-danger">حذف</a></td>


                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

@endsection
