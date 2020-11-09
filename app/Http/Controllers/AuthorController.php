<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ApiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retrieve and show all the authors
     * @return Illuminate\Http\Response
     * **/

    public function index()
    {
    }

    /**
     * Retrieve an instance the author
     * @return Illuminate\Http\Response
     * **/

    public function show($author)
    {
    }

    /**
     * Create an instance the author
     * @return Illuminate\Http\Response
     * **/

    public function store(Request $request)
    {
    }

    /**
     * Update an instance the author
     * @return Illuminate\Http\Response
     * **/
    public function update(Request $request, $author)
    {
    }

    /**
     * Removes an instance the author
     * @return Illuminate\Http\Response
     * **/
    public function destroy(Request $request, $author)
    {
    }
}
