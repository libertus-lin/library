@extends('layouts.admin')
@section('header', 'Catalog')

@section('css')
{{-- DataTable Plugins - CSS --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right"><i class="ri-add-fill"></i> Create
            New Catalog</a>
        </div>

        <div class="card-body">
          <table id="dataTable" class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Created_At</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">

        <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">

          <div class="modal-header">
            <h4 class="modal-title">Create New Catalog</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT" v-if="editStatus">

            <div class="form-group">
              <label for="name">Catalog name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter catalog name"
                :value="data.name" autofocus required>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
{{-- DataTable Plugins - JavaScript --}}
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
  var actionUrl = '{{ url('catalogs') }}';
  var apiUrl = '{{ url('api/catalogs') }}';

  var columns = [
    {data: 'DT_RowIndex', class: 'text-center', orderable: true },
    {data: 'name', class: 'text-start', orderable: true },
    { render: function (index, row, data, meta) {
        return `
              <a href="#" class="btn btn-sm btn-warning" onclick="controller.editData(event, ${meta.row})">
                Edit
              </a>
              <a class="btn btn-sm btn-danger" onclick="controller.deleteData(event, ${data.id})">
                Delete
              </a>`;
      }, orderable: false, width: '200px', class: 'text-center'},
  ];
</script>
<script src="{{ asset('js/data.js') }}"></script>
@endsection
