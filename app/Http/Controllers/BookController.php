<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponse;

    /**
     * the service to consumer the book service
     * @var bookService
     */
    public $bookService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Retrieve and show all the books
     * @return Illuminate\Http\Response
     * **/

    public function index()
    {
    }

    /**
     * Retrieve an instance the book
     * @return Illuminate\Http\Response
     * **/

    public function show($book)
    {
    }

    /**
     * Create an instance the book
     * @return Illuminate\Http\Response
     * **/

    public function store(Request $request)
    {
    }

    /**
     * Update an instance the book
     * @return Illuminate\Http\Response
     * **/
    public function update(Request $request, $book)
    {
    }

    /**
     * Removes an instance the book
     * @return Illuminate\Http\Response
     * **/
    public function destroy(Request $request, $book)
    {
    }
}
