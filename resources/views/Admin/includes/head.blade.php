<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mahavire Ecommerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="{{ asset('Admin/dist/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

  <style type="text/css">
    th, td{
      text-align: center;
    }
    td >a{
      width: 100px;
    }
    .save-button{
      text-align: right;
      margin-bottom: 36px;
    }
    .required-star{
      color: red;
    }
    .show-button{
      margin-top: 30px;
    }


    .file-area {
       width: 100%;
       height: 200px;
       position: relative;
       border: 2px;
       border-style: dashed;
       background-color: #f4f6f9;
    }
    .file-area input[type=file] {
       position: absolute;
       width: 100%;
       height: 100%;
       top: 0;
       left: 0;
       right: 0;
       bottom: 0;
       opacity: 0;
       cursor: pointer;
    }
    .file-area .file-dummy {
       width: 100%;
       height: 200px;
       padding: 30px;
       text-align: center;
       transition: background 0.3s ease-in-out;
       font-size: 20px;
    }
    .file-area .file-dummy .success {
       display: none;
    }
    .file-area:hover .file-dummy {
       background: rgba(255, 255, 255, 0.1);
    }
    .file-area input[type=file]:valid + .file-dummy .success {
       display: inline-block;
    }
    .file-area input[type=file]:valid + .file-dummy .default {
       display: none;
    }
    #successInsert{
      font-weight: bold;
      margin-top: 10px;
      font-size: 15px;
      color: rgb(54, 125, 166);
    }
  </style>

  
</head>