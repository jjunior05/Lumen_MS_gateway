<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
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

    /**
     * the service to consumer the author service
     * @var AuthorService
     */
    public $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Retrieve and show all the authors
     * @return Illuminate\Http\Response
     * **/

    public function index()
    {
        $this->successResponse($this->authorService->obtainAuthors());
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
