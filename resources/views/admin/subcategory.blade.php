@extends('layouts.theme')
@section('content')
<div class="card mb-4">
   <div class="card-body">
      <div class="d-flex justify-content-between">
         <div>
            <h4 style="color:black;" class="card-title mb-0">Manage Sub Category</h4>
         </div>
         <div>
            <a href="{{ route('indexAddSubCategory') }}"><button class="btn btn-primary">Add Sub Category</button></a>
         </div>
      </div>
      <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Sub Category name</th>
                            <th>Category name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="color:black">
                    @foreach($subcategory as $list)
                        <tr>
                            <td>{{$list->sub_category_name}}</td>
                            <td>{{optional($list->category)->category_name}}</td>
                            <td>
                                <a href="{{url('admin/sub-category/edit')}}/{{$list->id}}"><button type="button" class="btn btn-success">EDIT</button></a>
                                <a onclick="return confirm('Are you sure to delete?')" href="{{url('admin/sub-category/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">DELETE</button></a>
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
