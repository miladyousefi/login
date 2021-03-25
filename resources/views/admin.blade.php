@extends('layouts.auth')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row">
            @include('admin.nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h2 class="h2">لیست کاربران</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <a class="btn btn-success" href="{{route('add.writer')}}">+ ثبت کاربر جدید</a>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-primary table-bordered table-hover table-sm text-center ">
                        <thead>
                        <tr>
                            <th>شماره کاربری</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>درجه</th>
                            <th>اینستاگرام</th>
                            <th>تلگرام</th>
                            <th>حذف کاربر</th>
                            <th> اضافه کردن به ادمین ها</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($writers as $writer)
                        <tr>
                            <?php
                                $data=json_decode($writer->social,true);
                            ?>
                            <td>{{$writer->id}}</td>
                            <td>{{$writer->name}}</td>
                            <td>{{$writer->email}}</td>
                            <td>{{$writer->is_editor}}</td>
                            <td>
                                <?php if(!empty($data['instagram'])){
                                        ?>
                                        <a href="{{$data['instagram']}}" class="btn btn-outline-danger">
                                            <span class="fa fa-instagram"></span>
                                        </a>
                                        <?php
                                            } else {
                                                echo "N/A";
                                } ?>
                            </td>
                            <td>
                                <?php if(!empty($data['telegram'])){
                                        ?>
                                        <a href="{{$data['telegram']}}" class="btn btn-outline-primary">
                                            <span class="fa fa-telegram"></span>
                                        </a>
                                        <?php
                                            } else {
                                                echo "N/A";
                                } ?>
                            </td>
                            <td><a href="{{route('delete.writer',$writer->id)}}" class="btn btn-danger">حذف کاربر</a></td>
                            <td><a href="{{route('add.writer.to.admin',$writer->id)}}" class="btn btn-outline-primary">اضافه کردن</a></td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

@endsection
