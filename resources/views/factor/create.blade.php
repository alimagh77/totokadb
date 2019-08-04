@extends('layouts.app')

@section('content')
    <form action="/factor" class="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body text-right">
            <div class="card-block">
                <div class="row justify-content-center">
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: سال</label>
                            <input type="text" class="form-control text-right" id="basicInput" name="year" >
                        </fieldset>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: ماه</label>
                            <input type="text" class="form-control text-right" id="basicInput" name="month">
                        </fieldset>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: روز</label>
                            <input type="text" class="form-control text-right" id="basicInput" name="day">
                        </fieldset>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: هزینه جانبی</label>
                            <input type="text" class="form-control text-right" id="basicInput" name="side">
                        </fieldset>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: هزینه بدون فاکتور</label>
                            <input type="text" class="form-control text-right" id="basicInput" name="without">
                        </fieldset>
                    </div>
                </div>
                <fieldset class="form-group">
                    <label for="basicTextarea">: توضیح هزینه</label>
                    <textarea class="form-control text-right" id="basicTextarea" rows="3" name="amount"></textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea">: توضیحات</label>
                    <textarea class="form-control text-right" id="basicTextarea" rows="3" name="desc"></textarea>
                </fieldset>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: پیوست</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn mr-1 btn-round btn-success left " >
            ذخیره
        </button>
    </form>
@endsection

@section('script')

    <script src="/vendor/unischarp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>

@endsection