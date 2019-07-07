@extends('layouts.app')

@section('css')
  <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection()

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
          <h2>Product Categories</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
                <button type="button" class="btn btn-primary">New Product Category</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table class="table" id="tblCategories">
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>

        </div>
      </div>
  </div>
@endsection()

@section('js')
  <script src="{{asset('js/dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $("#tblCategories").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{route('api.getCategories')}}",
        "columns":[
          {
            "width": "20%",
            "data":"Name",
          },
          {
            "width": "60%",
            "data":"Description"
          },
          {
            "width": "20%",
            "data":null,
            "orderable": false,
            render: function ( data, type, row ) {
              return '<button type="button" class="btn btn-default">Edit</button>'
                     +'<button type="button" class="btn btn-danger">Delete</button>';
            }     
          },
        ]
      });
    });
  </script>
@endsection()