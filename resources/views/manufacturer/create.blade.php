@extends('layouts.app')

@section('content')
    <form action="/manufacturer" class="form" method="post">
        @csrf
        <div class="card-body text-right">
            <div class="card-block">
                <div class="row justify-content-center">
                    <div class="col-xl-2 col-lg-2 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: نام برند</label>
                            <input type="text" class="form-control text-right" id="basicInput" name="brand" >
                        </fieldset>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: نام صاحب</label>
                            <input type="text" class="form-control text-right" id="basicInput" name="name">
                        </fieldset>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput"> : سایز</label>
                            <select class="form-control text-right" id="basicSelect" name="size">
                                <option value="">انتخاب گزینه</option>
                                <option value="کوچک">  کوچک  </option>
                                <option value="متوسط">  متوسط  </option>
                                <option value="بزرگ">  بزرگ  </option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput"> : وضعیت</label>
                            <select class="form-control text-right" id="basicSelect" name="products">
                                <option value="">انتخاب گزینه</option>
                                <option value="اصلی">  اصلی  </option>
                                <option value="زیرمجموعه">  زیرمجموعه  </option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: تلفن </label>
                            <input type="text" class="form-control text-right" id="basicInput" name="phone">
                        </fieldset>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-2 col-lg-2 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput"> : صنعت</label>
                            <select class="form-control text-right" id="basicSelect" name="industry">
                                <option value="">انتخاب گزینه</option>
                                @foreach($indu as $ind)
                                    <option value="{{$ind->name}}">{{$ind->name}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput"> : تکنولوژی</label>
                            <select class="form-control text-right" id="basicSelect" name="tech">
                                <option value="">انتخاب گزینه</option>
                                @foreach($techn as $tech)
                                    <option value="{{$tech->name}}">{{$tech->name}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput"> : زیرمجموعه ی</label>
                            <select class="form-control text-right" id="basicSelect" name="sub">
                                <option value="">انتخاب گزینه</option>
                                @foreach($sub as $su)
                                    <option value="{{$su->brand}}">{{$su->brand}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">: آدرس</label>
                            <input type="text" class="form-control text-right" id="basicInput" name="mobile" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput"> : حوزه فعالیت </label>
                            <input type="text" class="form-control text-right" id="basicInput" name="realm">
                        </fieldset>
                    </div>
                </div>
                <br>
                <br>
                <br>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group justify-content-center">
                            <label for="basicTextarea">: توضیحات</label>
                            <textarea  class="form-control text-right" id="basicTextarea" rows="3" name="desc"></textarea>
                        </fieldset>
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