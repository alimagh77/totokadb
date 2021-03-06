@extends('layouts.app')

@section('content')
    <form action="{{route('editManufacturer',$manufacturer->id)}}" class="form" method="post">
        @csrf
        <div class="card-body">
            <div class="card-block">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">نام برند :</label>
                            <input type="text" value="{{$manufacturer->brand}}" class="form-control" id="basicInput" name="brand" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">نام صاحب :</label>
                            <input type="text" value="{{$manufacturer->name}}" class="form-control" id="basicInput" name="name">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">حوزه فعالیت :</label>
                            <input type="text" value="{{$manufacturer->realm}}" class="form-control" id="basicInput" name="realm" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">تلفن ثابت :</label>
                            <input type="text" value="{{$manufacturer->phone}}" class="form-control" id="basicInput" name="phone">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">تلفن همراه :</label>
                            <input type="text" value="{{$manufacturer->mobile}}" class="form-control" id="basicInput" name="mobile" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">سایز :</label>
                            <input type="text" value="{{$manufacturer->size}}" class="form-control" id="basicInput" name="size">
                        </fieldset>
                    </div>
                </div>
                <fieldset class="form-group">
                    <label for="basicTextarea">محصولات تولیدی :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="products">{{$manufacturer->products}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea">توضیحات:</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="desc">{{$manufacturer->description}}</textarea>
                </fieldset>
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