@extends('layouts.app')

@section('content')
    <form action="{{route('editFile',$file->id)}}" class="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body text-right">
            <div class="card-block">
                <fieldset class="form-group">
                    <label for="basicTextarea">: توضیحات</label>
                    <textarea class="form-control text-right" id="basicTextarea" rows="3" name="desc">{{$file->desc}}</textarea>
                </fieldset>
                <div class="row text-right justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: فایل</label>
                            @if($file->file!==null)
                                <br>
                                <br>
                                <a class="text-decoration-none" href="/provFile/{{$file->file}}">فایل حال حاضر</a>
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