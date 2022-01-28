@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Import CSV or Excel</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" action="{{ URL::to('admin/storeamazon-csv')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4">
            <div class="card-body">
              <div class="form-group file-area">
                <input type="file" name="csv" id="csv" required="required" accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" onchange="showName()" />
                <div class="file-dummy">
                  <div class="success" >
                    <div>
                        Drag and Drop here<br/>or<br/><u>Change to upload </u>
                    </div>
                    <div id="successInsert">
                      
                    </div>
                  </div>
                  <div class="default">
                    <div>
                        Drag and Drop here<br/>or<br/><u>Click to upload</u>
                    </div>
                  </div>
                </div>
              </div>
              <div class="save-button">
                <button type="submit" class="btn btn-primary">Import</button>
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