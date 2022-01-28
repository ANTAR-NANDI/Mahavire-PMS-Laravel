@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Store Keeping Unit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form method="post" action="{{ URL::to('updatesku/'.$editsku->id)}}">
                   @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">SKU Name</label>
                    <input type="text" value="{{$editsku->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
                  </div>

                  <div class="form-group">
                        <label>SKU Description</label>
                        <input name="description" value="{{$editsku->description}}"  class="form-control" rows="3" placeholder="Enter ...">
                      </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update SKU</button>
                </div>
              </form>
            </div>
    <!-- /.content -->
  </div>







@stop