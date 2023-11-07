<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();

        return view('admin.member', compact('members'))
               ->with(['title' => 'Halaman Members']);
    }

    // function api
    public function api()
    {
      $members = Member::all();
      $datatables = datatables()
                    ->of($members)
                    ->addColumn('date', function($member) {
                        return dateFormat($member->created_at);
                    })->addIndexColumn();

      return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' =>'required|string|min:6',
        'gender' =>'required|string|min:1',
        'email' =>'required|string|email|unique:users',
        'phone_number' =>'required|numeric|min:10',
        'address' =>'required|min:5',
      ]);

      Member::create($request->all());
      return redirect('members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
      $this->validate($request, [
        'name' =>'required|string|min:6',
        'gender' =>'required|string|min:1',
        'email' =>'required|string|email|unique:users',
        'phone_number' =>'required|numeric|min:10',
        'address' =>'required|min:5',
      ]);

      $member->update($request->all());

      return redirect('members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
      $member->delete();

      return redirect('members');
    }
}
