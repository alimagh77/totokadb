@extends('layouts.app')

@section('content')
    <form action="{{route('editSuggest',$suggest->id)}}" class="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body text-right">
            <div class="card-block">
                <div class="row justify-content-center">
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: سال</label>
                            <input type="text" value="{{$suggest->year}}" class="form-control" id="basicInput" name="year" >
                        </fieldset>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: ماه</label>
                            <input type="text" value="{{$suggest->month}}" class="form-control" id="basicInput" name="month" >
                        </fieldset>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: روز</label>
                            <input type="text" value="{{$suggest->day}}" class="form-control" id="basicInput" name="day" >
                        </fieldset>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: تک</label>
                            <input type="text" value="{{$suggest->single}}" class="form-control" id="basicInput" name="single" >
                        </fieldset>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: ست</label>
                            <input type="text" value="{{$suggest->set}}" class="form-control" id="basicInput" name="set" >
                        </fieldset>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: کارتن</label>
                            <input type="text" value="{{$suggest->box}}" class="form-control" id="basicInput" name="box" >
                        </fieldset>
                    </div>
                </div>
                <fieldset class="form-group">
                    <label for="basicTextarea">: توضیحات</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="desc">{{$suggest->desc}}</textarea>
                </fieldset>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: پیوست</label>
                            @if($suggest->file!==null);
                                <br>
                                <br>
                                <a class="text-decoration-none" href="/imageSuggest/{{$suggest->file}}">فایل حال حاضر</a>
                                <br>
                                <br>
                            @endif
                            <input type="file" class="form-control" id="file" name="file">
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn mr-1 btn-round btn-success left" >
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