<?php

namespace App\Http\Controllers;

class OptionalController extends Controller
{
    /**
     * Display the optional parameters example page
     */
    public function show($id = null, $slug = null)
    {
        $data = [
            'title' => 'Optional Routes Example',
            'id' => $id ?? 'Not provided',
            'slug' => $slug ?? 'Not provided',
            'description' => 'This page demonstrates optional route parameters'
        ];

        return view('optional-show', $data);
    }
}
