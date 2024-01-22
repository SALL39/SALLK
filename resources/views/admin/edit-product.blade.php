@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color:black;">Product Edit Form</h3>
            <div>
                <a href="{{ route('indexProduct') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>

        <div class="card-body">
            <div class="example">
                <form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row pl-3">
                        <div class="mb-3 col-6">
                            <label for="exampleInputName" class="form-label" style="color:black;">Product Specification</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                                id="exampleInputName" aria-describedby="emailHelp" />
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputPrice" class="form-label" style="color:black;">Price</label>
                            <input type="text" name="price" value="{{ $product->price }}" class="form-control"
                                id="exampleInputTitle" aria-describedby="emailHelp" />
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="row pl-3">
                        <div class="mb-3 col-6">
                            <label for="category_id" class="control-label mb-1" style="color:black;">Select Category</label>
                            <select id="category_id" class="form-control" name="category_id">
                                <option selected>Select Cateogry</option>
                                @foreach ($category as $val)
                                    <option 
                                    @if($val->id == $product->category_id)
                                        selected="selected"
                                    @endif
                                    value="{{ $val->id }}">{{ $val->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_name'))
                                <span class="text-danger">{{ $errors->first('category_name') }}</span>
                            @endif
                        </div>


                        <div class="mb-3 col-6">
                            <label for="sub_category_id" class="control-label mb-1" style="color:black;">Select Sub Category</label>
                            <select id="sub_category_id" class="form-control" name="sub_category_id">
                                <option value="">Select Sub Cateogry</option>
                                @foreach ($subcategory as $val)
                                    <option 
                                    @if($val->id == $product->sub_category_id)
                                        selected="selected"
                                    @endif
                                    value="{{ $val->id }}">{{ $val->sub_category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('sub_category_name'))
                                <span class="text-danger">{{ $errors->first('sub_category_name') }}</span>
                            @endif
                        </div>


                    </div>


                    <br>
                    <div class="row">

                        <div class="hdtuto lst increment mb-3 col-4 d-flex">

                            <label for="image" class="col-sm-3 col-form-label" style="color:black">Upload Image</label><br>
                            <input type="file" name="image" class="myfrm form-control">
                        </div>

                        @if ($errors->has('image'))
                            <span class="text-danger pl-3">{{ $errors->first('image') }}</span>
                        @endif

                        <div class="form-group col-md-4">
                            <image style="width:150px;height:160px; border:1px solid #000"
                                src="{{ !empty($product->image) ? url('/upload/image/' . $product->image) : url('/upload/nofound.png') }}">

                        </div>

                    </div>


                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary ml-3 ml-0">Submit</button>
                </form>
            </div>
        </div>
    @endsection
