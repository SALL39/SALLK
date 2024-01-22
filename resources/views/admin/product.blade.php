@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 style="color:black;" class="card-title mb-0">Product</h4>
                </div>
                <div>
                    <a href="{{ route('indexAddProduct') }}"><button class="btn btn-primary">Add Product</button></a>
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>Specification</th>
                                    <th>Category</th>
                                    <th>SubCatgory</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="color:black">
                                @foreach ($product as $list)
                                    <tr>
                                        <td>{{ $list->name }}</td>

                                        <td>{{ optional($list->category)->category_name }}</td>
                                        <td>{{ optional($list->subcategory)->sub_category_name }}</td>
                        
                                        <td>{{ $list->price }}</td>
                                        <td> <img
                                                src="{{ !empty($list->image) ? url('/upload/image/' . $list->image) : url('/upload/nofound.png') }}"
                                                alt="" style="width:150px;height:100px; border:1px solid #000"
                                                width="200" height="80">
                                        </td>

                                        <td>
                                            <a href="{{ url('admin/product/edit') }}/{{ $list->id }}"><button
                                                    type="button" class="btn btn-success">Edit</button></a>
                                            <a onclick="return confirm('Are you sure to delete?')" href="{{ url('admin/product/delete/') }}/{{ $list->id }}"><button
                                                    type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        @endsection
