@extends('layouts.app')

@section('content')
    <form action="/customer" class="form" method="post">
        @csrf
        <div class="card-body">
            <div class="card-block">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">نام :</label>
                            <input type="text" class="form-control" id="basicInput" name="name" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">تلفن :</label>
                            <input type="text" class="form-control" id="basicInput" name="phone" >
                        </fieldset>
                    </div>
                </div>  <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">حوزه فعالیت :</label>
                            <input type="text" class="form-control" id="basicInput" name="job" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">جایگاه حقوقی :</label>
                            <input type="text" class="form-control" id="basicInput" name="pos">
                        </fieldset>
                    </div>
                </div>
                <fieldset class="form-group">
                    <label for="basicTextarea">آدرس :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="address"></textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea">استفاده :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="use"></textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea">توضیحات :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="desc"></textarea>
                </fieldset>
            </div>
            <hr>
        </div>

        <button type="submit" class="btn mr-1 btn-round btn-success left" >
            ذخیره
        </button>
    </form>
@endsection

@section('script')


    <script src="/vendor/unischarp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>





@endsection