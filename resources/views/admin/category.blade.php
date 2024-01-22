@extends('layouts.theme')
@section('content')
<div class="card mb-4">
   <div class="card-body">
      <div class="d-flex justify-content-between">
         <div>
            <h4 style="color:black;" class="card-title mb-0">Manage Category</h4>
         </div>
         <div>
            <a href="{{ route('indexAddCategory') }}"><button class="btn btn-primary">Add Category</button></a>
         </div>
      </div>
      <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="color:black">
                    @foreach($category as $list)
                        <tr>
                            <td>{{$list->category_name}}</td>
                            <td>
                                <a href="{{url('admin/category/edit')}}/{{$list->id}}"><button type="button" class="btn btn-success">EDIT</button></a>
                                <a onclick="return confirm('Are you sure to delete?')" href="{{url('admin/category/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">DELETE</button></a>
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
