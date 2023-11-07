@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="catalog-section">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <a href="{{ url('catalogs/create') }}" class="btn btn-sm btn-primary"><i class="ri-add-fill"></i> Create New Catalog</a>
            </div>

            <div class="card-body">
              <table id="dataTable" class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th class="text-center">Total Books</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center" colspan="2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($catalogs as $catalog)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $catalog->name }}</td>
                    <td class="text-center">{{ count($catalog->books) }}</td>
                    <td class="text-center">{{ dateFormat($catalog->created_at) }}</td>
                    <td class="text-center">
                      <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-sm btn-warning"><i class="ri-edit-line"></i> Edit</a>
                    </td>
                    <td class="text-center">
                      <form action="{{ url('catalogs/'.$catalog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="ri-delete-bin-6-fill"></i> Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
