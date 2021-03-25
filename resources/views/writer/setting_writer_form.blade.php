@extends('layouts.auth')
@section('content')
    <div class="container-fluid  text-right" dir="rtl">
        <div class="row justify-content-center">
            @include('writer.nav')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ثبت کاربر جدید </div>

                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                <img onclick="getfile()" src="../../images/profile/@if(isset($writer->image)){{$writer->image}}@elseif($writer->image==null){{'def.png'}}@endif" class="rounded-circle m-5" width="100" height="100" alt="">
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
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if(isset($writer->name)) {{$writer->name}} @endif{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(isset($writer->email)) {{$writer->email}}@endif{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>





                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('ثبت کاربر') }}
                            </button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
