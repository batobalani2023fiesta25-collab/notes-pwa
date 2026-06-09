<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class BasicController extends Controller
{
    /**
     * Display the basic routes example page
     */
    public function index()
    {
        return view('basic', [
            'title' => 'Basic Routes Example',
            'description' => 'This page demonstrates basic Laravel routes'
        ]);
    }

    /**
     * Display a single item
     */
    public function show($id)
    {
        return view('basic-show', [
            'id' => $id,
            'name' => 'Item ' . $id,
            'description' => 'This is a basic route parameter example'
        ]);
    }
}
