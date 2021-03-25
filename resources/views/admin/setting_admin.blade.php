@extends('layouts.auth')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row">
            @include('admin.nav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">تنظیمات</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                       

                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center">
                            <img onclick="getfile()" src="../../images/profile/@if(isset($admin->image)){{$admin->image}}@elseif($admin->image==null){{'def.png'}}@endif" class="rounded-circle m-5" width="100" height="100" alt="">
                        </div>
                        <input type="file" style="display: none" name="profile" id="profile">
                        <script>
                            function getfile(){
                                document.getElementById("profile").click();
                            }
                        </script>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if(isset($admin->name)) {{$admin->name}} @endif{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(isset($admin->email)) {{$admin->email}}@endif{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>





                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('ثبت تغییرات') }}
                        </button>


                    </form>
                </div>    
            </main>
        </div>
    </div>

@endsection
