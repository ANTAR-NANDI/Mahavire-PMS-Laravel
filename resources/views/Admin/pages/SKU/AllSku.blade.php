
@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Employees List of Mahavire Company</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>ID</th>
                    <th>SKU Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                     @foreach($skus as $d)
                  <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->description }}</td>
                    <td> <a href="{{ URL::to('/Admin/Sku/EditSku/'.$d->id)}}" class="btn btn-danger btn-sm">Edit</a> </td>
                    <td> <a href="{{ URL::to('/Admin/Sku/DeleteSku/'.$d->id)}}" class="btn btn-danger btn-sm">Delete</a> </td>
                    
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                       <th>ID</th>
                    <th>SKU Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  </div>






@stop