@extends('layouts.app')

@section('content')
    <form action="/product" class="form" method="post" enctype="multipart/form-data">
        @csrf
    <div class="card-body text-right">
        <div class="card-block">
            <div class="row justify-content-center">
                <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">: نام محصول</label>
                        <input type="text" class="form-control text-right" id="basicInput" name="color" >
                    </fieldset>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput"> : تولیدکننده</label>
                        <select class="form-control text-right" id="basicSelect" name="manufacturers">
                            <option class="text-right" value="">انتخاب گزینه</option>
                            @foreach($manu as $man)
                                <option value="{{$man->brand}}">{{$man->brand}}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">: دسته بندی</label>
                        <input type="text" class="form-control text-right" id="basicInput" name="category" >
                    </fieldset>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">: ریز دسته بندی</label>
                        <input type="text" class="form-control text-right" id="basicInput" name="categoryDetails">
                    </fieldset>
                </div>
            </div>
        </div>
        <br>
            <div class="row justify-content-center">
                <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">: ارزش اقتصادی</label>
                        <select class="form-control text-right" id="basicSelect" name="value">
                            <option value="0">انتخاب گزینه</option>
                            <option value="0">  1  </option>
                            <option value="0">  2  </option>
                            <option value="0">  3  </option>
                            <option value="0">  4  </option>
                            <option value="0">  5  </option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">: کیفیت</label>
                            <select class="form-control text-right" id="basicSelect" name="quality">
                                <option value="0">انتخاب گزینه</option>
                                <option value="0">  1  </option>
                                <option value="0">  2  </option>
                                <option value="0">  3  </option>
                                <option value="0">  4  </option>
                                <option value="0">  5  </option>
                            </select>
                    </fieldset>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">: وضعیت بسته بندی</label>
                        <select class="form-control text-right" id="basicSelect" name="pack">
                            <option value="0">انتخاب گزینه</option>
                            <option value="0">  1  </option>
                            <option value="0">  2  </option>
                            <option value="0">  3  </option>
                            <option value="0">  4  </option>
                            <option value="0">  5  </option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group text-lg-right">
                        <label for="basicInput" class="text-right">: ارزش اقتصادی ارزی</label>
                        <input type="text" class="form-control text-right" id="basicInput" name="valueEco">
                    </fieldset>
                </div>
            </div>
            <hr>
            <fieldset class="form-group">
                <label for="basicTextarea"> : کاربردها</label>
                <textarea class="form-control text-right" id="basicTextarea" rows="3" name="use"></textarea>
            </fieldset>
            <hr>
            <fieldset class="form-group">
                <label for="basicTextarea"> : توان تولید</label>
                <textarea class="form-control text-right" id="basicTextarea" rows="3" name="ability"></textarea>
            </fieldset>
            <hr>
            <fieldset class="form-group">
                <label for="basicTextarea"> : ظرفیت تولید</label>
                <textarea class="form-control text-right" id="basicTextarea" rows="3" name="capacity"></textarea>
            </fieldset>
            <hr>
            <fieldset class="form-group">
                <label for="basicTextarea"> : ملزومات تولید</label>
                <textarea class="form-control text-right" id="basicTextarea" rows="3" name="supplies"></textarea>
            </fieldset>
            <hr>
            <fieldset class="form-group">
                <label for="basicTextarea"> : جزئیات</label>
                <textarea class="form-control text-right" id="basicTextarea" rows="3" name="details"></textarea>
            </fieldset>
            <hr>
            <fieldset class="form-group">
                <label for="basicTextarea">: توضیحات</label>
                <br>
                <textarea class="form-control text-right" id="basicTextarea" rows="3" name="desc"></textarea>
            </fieldset>
        <br>
            <div class="row justify-content-center">
                <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                    <fieldset class="form-group">
                        <label for="basicInput">: عکس</label>
                        <input type="file" class="form-control" id="image" name="image" >
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