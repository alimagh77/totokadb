@extends('layouts.app')

@section('content')
    <form action="{{route('editProduct',$product->id)}}" class="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="card-block">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">نام محصول :</label>
                            <input type="text" value="{{$product->color}}" class="form-control" id="basicInput" name="color" >
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">دسته بندی :</label>
                            <input type="text" value="{{$product->category}}" class="form-control" id="basicInput" name="category" >
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">ریز دسته بندی :</label>
                            <input type="text" value="{{$product->categoryDetails}}" class="form-control" id="basicInput" name="categoryDetails">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">ارزش اقتصادی :</label>
                            <select class="form-control" id="basicSelect" name="value">
                                <option value="{{$product->value}}">{{$product->value}}</option>
                                <option value="1">  1  </option>
                                <option value="2">  2  </option>
                                <option value="3">  3  </option>
                                <option value="4">  4  </option>
                                <option value="5">  5  </option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">کیفیت :</label>
                            <select class="form-control" id="basicSelect" name="quality">
                                <option value="{{$product->quality}}">{{$product->quality}}</option>
                                <option value="1">  1  </option>
                                <option value="2">  2  </option>
                                <option value="3">  3  </option>
                                <option value="4">  4  </option>
                                <option value="5">  5  </option>
                            </select>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">وضعیت بسته بندی :</label>
                            <select class="form-control" id="basicSelect" name="pack">
                                <option value="{{$product->pack}}">{{$product->pack}}</option>
                                <option value="1">  1  </option>
                                <option value="2">  2  </option>
                                <option value="3">  3  </option>
                                <option value="4">  4  </option>
                                <option value="5">  5  </option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group text-lg-right">
                            <label for="basicInput">: ارزش اقتصادی(ارزی)</label>
                            <input type="text" value="{{$product->valueEco}}" class="form-control" id="basicInput" name="valueEco">
                        </fieldset>
                    </div>
                </div>
                <fieldset class="form-group">
                    <label for="basicTextarea">شرکت های تولید کننده :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="manufacturers">{{$product->manufacturers}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea"> کاربردها :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="use">{{$product->use}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea"> توان تولید :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="ability">{{$product->ability}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea"> ظرفیت تولید :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="capacity">{{$product->capacity}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea"> ملزومات تولید :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="supplies">{{$product->supplies}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea"> جزئیات :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="supplies">{{$product->details}}</textarea>
                </fieldset>
                <hr>
                <fieldset class="form-group">
                    <label for="basicTextarea">توضیحات :</label>
                    <textarea class="form-control" id="basicTextarea" rows="3" name="desc">{{$product->description}}</textarea>
                </fieldset>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">عکس :</label>
                            <br>
                            <img width="500px" src="/imageProduct/{{$product->image}}">
                            <br>
                            <br>
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