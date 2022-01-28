
@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.card -->

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">All Categories of Mahavire Company</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <!-- @if(session('msg'))
            <div class="alert alert-danger">
                {{ session('msg')}}
            </div>

            @endif -->
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Status</th>
            <th>Actions</th>
            
            
          </tr>
          </thead>
         <tbody>
            @foreach($categories as $d)
          <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->status ? $d->status : "N/A"  }}</td>
            <td> 
              <a href="{{ URL::to('/admin-edit-category/'.$d->id)}}" class="btn btn-info btn-sm">Edit</a>
              <a href="{{ URL::to('/admin-delete-category/'.$d->id)}}" class="btn btn-danger btn-sm">Delete</a>
            </td>
            
            
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>






@stop