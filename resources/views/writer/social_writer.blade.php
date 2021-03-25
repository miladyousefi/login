@extends('layouts.auth')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row">
            @include('writer.nav')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 text-right">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                   <h3>
                       شبکه ها اجتماعی 

                   </h3>
                </div>

                <form method="post" >
                    @csrf
                    <div class="row ">
                        <div class="col-md-6">
                            <label for="instagram"><span class="fa fa-instagram"></span></label> اینستاگرام</label>
                            
                                <input type="text" name="instagram" id="instagram" class="form-control text-left" value="@if(isset($writer)){{ $writer['instagram'] }}@endif">
                            
                        </div>
                        <div class="col-md-6">
                            <label for="telegram"> <span class="fa fa-telegram"></span></label> تلگرام</label>
                                <input type="text" name="telegram" id="instagram" class="form-control text-left" value="@if(isset($writer)){{ $writer['telegram'] }}@endif">
                           
                        </div>
                            <button type="submit" class="btn btn-outline-success btn-block form-control m-5">ثبت تغییرات</button>
                        
                    </div>
                   
                </form>
              

            </main>
        </div>
    </div>

@endsection
