@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color:black;">ADD-SUBCATEGORY</h3>
            <div>
                <a href="{{ route('indexSubCategory') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">

            <div class="example">
                <form method="post" action="{{ route('storeSubCategory') }}">
                    @csrf

                    <div class="mb-3 col-6">
                        <label for="category_id" class="control-label mb-1" style="color:black;">Type of Category</label>
                        <select id="category_id" class="form-control" name="category_id">
                            <option selected>Select Type of Category</option>
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_name'))
                            <span class="text-danger">{{ $errors->first('category_name') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 col-10">
                        <label for="exampleInputEmail1"style="color:black;" class="form-label">Enter your subcategory
                            name</label>
                        <input type="text" name="sub_category_name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        @if ($errors->has('sub_category_name'))
                            <span class="text-danger ">{{ $errors->first('sub_category_name') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
