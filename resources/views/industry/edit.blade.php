@extends('layouts.app')

@section('content')
    <form action="{{route('editIndustry',$industry->id)}}" class="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body text-right">
            <div class="card-block">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                            <label for="basicInput">عنوان :</label>
                            <input type="text" value="{{$industry->name}}" class="form-control" id="basicInput" name="name" >
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
