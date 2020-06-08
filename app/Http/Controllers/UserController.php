<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('user.index');
    }

    public function showCatalog() {
        
    }

    public function showTransaction() {
        return view('user.transaction');
    }

    public function create()
    {
        //
    }

    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
