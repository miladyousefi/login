@extends('layouts.auth')

@section('content')
<div class="container-fluid" dir="rtl">
    <div class="row">
        @include('writer.nav')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">داشبورد</h1>
                <div class="btn-toolbar mb-2 mb-md-0">

                </div>
            </div>

            <form method="post" enctype="multipart/form-data" class="text-right">
                @csrf
                <div class="form-group col-md-12">
                    <label for="inputEmail4">عنوان</label>
                    <input type="text" name="title" class="form-control" placeholder="عنوان">
                </div>
                <div class="form-group col-md-12">
                    <label for="text">متن</label>
                    <textarea class="form-control" name="body" id="text" rows="6">

                    </textarea>
                </div>

                <div class="form-group col-md-12">
                    <span onclick="getfile()" class="btn btn-primary">
                        انتخاب عکس برای محتوا
                    </span>
                    <input type="file" name="image"  id="image" style="display: none" required>
                    <script>
                        function getfile(){
                            document.getElementById("image").click();
                        }
                    </script>
                </div>


                <div class="form-group col-md-12">
                    <button class="btn btn-success btn-block">
                        ثبت مطلب
                    </button>
                </div>

            </form>
        </main>
    </div>
</div>

@endsection
