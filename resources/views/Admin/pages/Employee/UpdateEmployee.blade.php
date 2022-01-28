@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Employee -- <strong> {{$editemployee->name}}</strong></h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <div class="row">
        <div class="col-md-4">
          <form method="post" action="{{ URL::to('updateemployee/'.$editemployee->id) }}">
               @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Employee Name</label>
                <input type="text" value="{{$editemployee->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Employee Name">
              </div>
              <div class="form-group">
                <label>Employee Designation</label>
              <select value="{{ $editemployee->designation }}" name="designation" class="form-control select2" style="width: 100%;">
                <option>Cashier</option>
                <option>Manager</option>
                <option>Supplier</option>
                <option>Bearer</option>
              </select>
              </div>
            
            <!-- /.card-body -->

              <div class="save-button">
                <button type="submit" class="btn btn-primary">Update Employee</button>
              </div>
            </div>
          </form>
        </div>
      </div>
          
    </div>
    <!-- /.content -->
  </div>







@stop