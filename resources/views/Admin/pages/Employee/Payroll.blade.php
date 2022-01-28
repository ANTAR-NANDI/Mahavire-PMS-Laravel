@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Payroll</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" action="{{ URL::to('add-payroll')}}">
         @csrf
        <div class="row">
          <div class="col-md-4">
            <div class="card-body">
              <div class="form-group">
                <label>Employee Name<span class="required-star">*</span></label>
                <select name="name" class="form-control select2" style="width: 100%;">
                  <option value="">--Select Employee--</option>
                  @foreach($employees as $d)
                    <option value="{{ $d->name }}">{{ $d->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="Amount">Enter Amount<span class="required-star">*</span></label>
                <input type="number" name="ammount" class="form-control" placeholder="Enter Amount">
              </div>

              <div class="form-group">
                <label>Payroll Date<span class="required-star">*</span></label>
                  <div class="input-group date">
                      <input name="date" type="date" class="form-control" />  
                  </div>
              </div>

               <div class="form-group">
                <label for="Amount">Enter Reason<span class="required-star">*</span></label>
                <input type="text" name="reason" class="form-control" placeholder="Enter Reason">
              </div>
              <div class="save-button">
                <button type="submit" class="btn btn-primary">Add payroll</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </form>
    </div>
    <!-- /.content -->
  </div>







@stop