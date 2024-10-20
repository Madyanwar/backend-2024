<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public $Animal = ['cat', 'fish', 'bird'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Animal;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->Animal[] = $request->Animal;
        return $this->Animal;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $this->Animal[$id] = $request->animal;
        return $this->Animal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id) {
        unset($this->Animal[$id]);
        return array_values($this->Animal);
    }
}
