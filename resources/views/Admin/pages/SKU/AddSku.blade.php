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
                <form method="post" action="{{ URL::to('addsku')}}">
                   @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">SKU Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
                  </div>

                  <div class="form-group">
                        <label>SKU Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add SKU</button>
                </div>
              </form>
            </div>
    <!-- /.content -->
  </div>







@stop