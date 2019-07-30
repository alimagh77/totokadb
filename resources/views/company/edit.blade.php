@extends('layouts.app')

@section('content')
    <form action="{{route('editCompany',$company->id)}}" class="form" method="post">
        @csrf
        <div class="card-body">
            <div class="card-block">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1 text-sm-right">
                        <fieldset class="form-group">
                            <label for="basicInput">نام :</label>
                            <input type="text" value="{{$company->name}}" class="form-control text-md-right" id="basicInput" name="name" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1 text-sm-right">
                        <fieldset class="form-group">
                            <label for="basicInput">وبسایت :</label>
                            <input type="text" value="{{$company->website}}" class="form-control text-md-right" id="basicInput" name="web">
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1 text-sm-right">
                        <fieldset class="form-group">
                            <label for="basicInput">: تاریخ آغاز به کار</label>
                            <input type="text" value="{{$company->date}}" class="form-control text-md-right" id="basicInput" name="date" >
                        </fieldset>
                    </div>
                </div>
                <fieldset class="form-group text-sm-right">
                    <label for="basicTextarea">: حوزه فعالیت</label>
                    <textarea class="form-control text-md-right" id="basicTextarea" rows="3" name="realm">{{$company->realm}}</textarea>
                </fieldset>
                <fieldset class="form-group text-sm-right">
                    <label for="basicTextarea">: نقاط ضعف و قوت</label>
                    <textarea class="form-control text-md-right" id="basicTextarea" rows="3" name="mobile">{{$company->mobile}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group text-sm-right">
                    <label for="basicTextarea">: بنیانگذاران</label>
                    <textarea class="form-control text-md-right" id="basicTextarea" rows="3" name="founder">{{$company->founder}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group text-sm-right">
                    <label for="basicTextarea">: همکاری با</label>
                    <textarea class="form-control text-md-right" id="basicTextarea" rows="3" name="partner">{{$company->partner}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group text-sm-right">
                    <label for="basicTextarea">: حمایت شده توسط</label>
                    <textarea class="form-control text-md-right" id="basicTextarea" rows="3" name="phone">{{$company->support}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group text-sm-right">
                    <label for="basicTextarea">: خدمت به</label>
                    <textarea class="form-control text-md-right" id="basicTextarea" rows="3" name="support">{{$company->service}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group text-sm-right">
                    <label for="basicTextarea">: تلفن ها</label>
                    <textarea class="form-control text-md-right" id="basicTextarea" rows="3" name="support">{{$company->phone}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group text-sm-right">
                    <label for="basicTextarea">توضیحات :</label>
                    <textarea class="form-control text-md-right" id="basicTextarea" rows="3" name="desc">{{$company->description}}</textarea>
                </fieldset>
            </div>
        </div>

        <button type="submit" class="btn mr-1 btn-round btn-success left" >
            ذخیره
        </button>
    </form>
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