@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Category</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <div class="row">
        <div class="col-md-4">
          <form method="post" action="{{ URL::to('addcategory')}}">
               @csrf
            <div class="card-body">
               @if(session('msg'))
                <div class="alert alert-danger">
                    {{ session('msg')}}
                </div>

                @endif
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
              </div>
              <div class="form-group">
                <label>Category Status</label>
              <select name="status" class="form-control select2" style="width: 100%;">
                <option value=""  selected="selected">--Select Status--</option>
                <option value="Debit">Debit</option>
                 <option value="Credit">Credit</option>
              </select>
              </div>
              <!-- /.card-body -->

              <div class="save-button">
                <button type="submit" class="btn btn-primary">Add Category</button>
              </div>

            </div>
          </form>
        </div>
      </div>
          
    </div>
    <!-- /.content -->
  </div>







@stop