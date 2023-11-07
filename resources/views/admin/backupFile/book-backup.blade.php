@extends('layouts.admin')
@section('header', 'Book')

@section('content')
<div id="controller">
  <div class="row">
    <div class="col-md-5 offset-md-3">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
        <input type="text" class="form-control" autocomplete="off" placeholder="Search from title" v-model="search">
      </div>
    </div>

    <div class="col-md-2">
      <button class="btn btn-sm btn-primary" @click="addData()">Create New Book</button>
    </div>
  </div>

  <hr />

  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filteredBooks">
      <div class="info-box" v-on:click="editData(book)">
        <div class="info-box-content">
          <span class="info-box-text h3">@{{ book.title }} ( @{{ book.qty }})</span>
          <span class="info-box-number">Rp. @{{ numberWithSpace(book.price) }},-<small></small> </span>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">

        <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">

          <div class="modal-header">
            <h4 class="modal-title">Create New Book</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="PUT" v-if="editStatus">

            <div class="form-group">
              <label for="isbn">ISBN</label>
              <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Enter isbn" :value="book.isbn" autofocus required>
            </div>

            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Title" :value="book.title" required>
            </div>

            <div class="form-group">
              <label for="year">Year</label>
              <input type="number" class="form-control" name="year" id="year" placeholder="Year" :value="book.year" required>
            </div>

            {{-- publisher --}}
            <div class="form-group">
              <label for="publisher">Publisher</label>
              <select class="form-control" name="publisher_id" id="publisher_id" required>
                <option selected disabled>=== Select publisher ===</option>
                @foreach($publishers as $publisher)
                  <option :selected="book.publisher_id == {{ $publisher->id }}" value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
              </select>
            </div>

            {{-- author --}}
            <div class="form-group">
              <label for="author">Author</label>
              <select class="form-control" name="author_id" id="author_id">
                <option selected disabled>=== Select author ===</option>
                @foreach($authors as $author)
                  <option :selected="book.author_id == {{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
              </select>
            </div>

            {{-- catalog --}}
            <div class="form-group">
              <label for="catalog">Catalog</label>
              <select class="form-control" name="catalog_id" id="catalog_id">
                <option selected disabled>=== Select catalog ===</option>
                @foreach($catalogs as $catalog)
                  <option :selected="book.catalog_id == {{ $catalog->id }}" value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="qty">Qty Stock</label>
              <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" :value="book.qty" required>
            </div>

            <div class="form-group">
              <label for="price">Harga Pinjam</label>
              <input type="number" class="form-control" name="price" id="price" placeholder="Price" :value="book.price" required>
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal" v-if="editStatus" v-on:click="deleteData(book.id)">Delete</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
  <script type="text/javascript">
    var actionUrl = '{{ url('books') }}';
    var apiUrl = '{{ url('api/books') }}';

    var app = new Vue({
      el: '#controller',
      data: {
        books: [],
        search: '',
        book: {},
        editStatus: false
      },
      mounted: function () {
        this.get_books();
      },
      methods: {
        // method tampilData
        get_books() {
          const _this = this;
          $.ajax({
                url: apiUrl,
                method: 'GET',
                success: function (data) {
                  _this.books = data;
                },
                error: function (error) {
                  console.log(error);
                }
          });
        },

        // method tambahData (berhasil addData)
        addData() {
          this.book = {};
          this.editStatus = false;
          $('#modal-default').modal();
        },

        // method editData
        editData(book) {
          this.book = book;
          this.editStatus = true;
          $('#modal-default').modal();
        },

        // method deleteData
        deleteData(id) {
          if (confirm("Are you sure to delete this Author ?")) {
            $(event.target).filteredBooks.remove();
            axios.post(this.actionUrl + "/" + id, { _method: "DELETE" }).then((response) => {
              alert("Data has been deleted");
            });
          }
        },

        // method formatNumber
        numberWithSpace(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
      },

      // method filterData -> lifeDataSearching
      computed: {
        filteredBooks() {
          return this.books.filter(book => {
            return book.title.toLowerCase().includes(this.search.toLowerCase());
          });
        },
      }
    })
  </script>
@endsection


