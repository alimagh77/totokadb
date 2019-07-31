@extends('layouts.app')

@section('content')
    <form action="{{route('editMeeting',$meeting->id)}}" class="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body text-right">
            <div class="card-block">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: موضوع</label>
                            <input type="text" value="{{$meeting->topic}}" class="form-control text-right" id="basicInput" name="topic" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: تاریخ</label>
                            <input type="text" value="{{$meeting->date}}" class="form-control text-right" id="basicInput" name="date">
                        </fieldset>
                    </div>
                </div>
                <fieldset class="form-group">
                    <label for="basicTextarea">: کلمات کلیدی</label>
                    <textarea class="form-control text-right" id="basicTextarea" rows="3" name="key">{{$meeting->keyPoints}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea">: اعضا</label>
                    <textarea class="form-control text-right" id="basicTextarea" rows="3" name="members">{{$meeting->members}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea">: توضیحات</label>
                    <textarea class="form-control text-right" id="basicTextarea" rows="3" name="desc">{{$meeting->description}}</textarea>
                </fieldset>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: عکس</label>
                            <br>
                            <img width="450px" src="/imageMeeting/{{$meeting->image}}">
                            <br>
                            <br>
                            <input type="file" class="form-control" id="image" name="image" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: پیوست</label>
                            @if($meeting->file!==null);
                            <br>
                            <br>
                            <a class="text-decoration-none" href="/imageMeeting/{{$meeting->file}}">فایل حال حاضر</a>
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