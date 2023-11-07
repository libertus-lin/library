<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    $total_members = Member::count();
    $total_books = Book::count();
    $total_transactions = Transaction::whereMonth('date_start', date('m'))->count();
    $total_publishers = Publisher::count();

    $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id', 'ASC')->pluck('total');
    $label_donut = Publisher::orderBy('publishers.id', 'ASC')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('name')->pluck('name')->pluck('name');

    $label_bar = ['Transaction'];
    $data_bar = [];

    foreach ($label_bar as $key => $value) {
      $data_bar[$key]['label'] = $label_bar[$key];
      $data_bar[$key]['backgroundColor'] = 'rgba(60, 141, 188, 0)';
      $data_month = [];

      foreach (range(1, 12) as $month) {
        $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
      }

      $data_bar[$key]['data'] = $data_month;
    }

    // return view('admin.dashboard', compact('total_books', 'total_members', 'total_transactions','total_publishers', 'data_donut', 'label_donut', 'data_bar'))->with(['title' => 'Halaman Dashboard']);
    return view('admin.dashboard', compact('total_books', 'total_members', 'total_transactions','total_publishers', 'data_donut', 'label_donut'))->with(['title' => 'Halaman Dashboard']);
  }

  public function catalog()
  {
    $catalogs = Catalog::all();
    return view('admin.catalog', compact('catalogs'));
  }
  public function publisher()
  {
    $publishers = Publisher::all();
    return view('admin.publisher', compact('publishers'));
  }
  public function author()
  {
    $authors = Author::all();
    return view('admin.author', compact('authors'));
  }
}
