@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.card -->

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Payrolls History</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Reason</th>
            
          </tr>
          </thead>
          <tbody>
            @foreach($payrolls as $d)
            <tr>
              <td>{{ $d->id }}</td>
              <td>{{ $d->name }}</td>
              <td>{{ $d->date }}</td>
              <td>{{ $d->ammount }}</td>
              <td>{{ $d->reason }}</td>
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