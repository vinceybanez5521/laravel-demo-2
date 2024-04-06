<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Common Controller Functions: index, show, store, update, destroy
    public function index() {
        return '<h1>UserController Index Page</h1>';
    }

    public function show($id) {
        /* // Query Parameter
        $search = request()->query('search');
        dd($search); */

        $mockData = [
            'id' => $id,
            'name' => 'Juan Dela Cruz',
            'email' => 'jdelacruz@gmail.com'
        ];

        // return '<h1>UserController Show Page ' . $id . '</h1>';
        return view('user.show', ['mockData' => $mockData]);
    }
}
