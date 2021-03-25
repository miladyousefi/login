@extends('layouts.auth')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row">
           @include('admin.nav')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h2 class="text-center">لسیت ادمین ها</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <a class="btn btn-success" href="{{route('add.writer')}}">+ ثبت کاربر جدید</a>
                        </div>

                    </div>
                    
                </div>


                @include('layouts.notification')

               
                
                <div class="table-responsive">
                    <table class="table table-primary table-bordered table-hover table-sm text-center ">
                        <thead>
                        <tr>
                            <th>شماره کاربری</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>درجه</th>
                            <th>حذف از ادمین</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td><span class="fa fa-bomb"></span></td>
                                <td><a href="{{route('delete.admin',$admin->id)}}" class="btn btn-danger">حذف</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

@endsection
