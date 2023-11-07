@extends('layouts.admin')
@section('header', 'Author')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">
        <h5 class="card-title">Edit Catalog</h5>
      </div>

      <form action="{{ url('catalogs/'.$catalog->id) }}" method="post">
        @csrf
        {{-- @method('PUT') --}}
        {{ method_field('PUT') }}
        <div class="card-body">
          <div class="form-group">
            <label for="name" class="form-label">Catalog name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter catalog name" value="{{ $catalog->name }}" required />
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
