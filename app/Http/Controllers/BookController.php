<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponse;

    /**
     * the service to consumer the book service
     * @var bookService
     */
    public $bookService;

    /**
     * the service to consumer the author service
     * @var authorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * Retrieve and show all the books
     * @return Illuminate\Http\Response
     * **/

    public function index()
    {
        $this->successResponse($this->bookService->obtainbooks());
    }

    /**
     * Retrieve an instance the book
     * @return Illuminate\Http\Response
     * **/

    public function show($book)
    {
        $this->successResponse($this->bookService->obtainbook($book));
    }

    /**
     * Create an instance the book
     * @return Illuminate\Http\Response
     * **/

    public function store(Request $request)
    {
        $this->authorService->obtainAuthor($request->author_id);

        $this->successResponse($this->bookService->createbooks($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Update an instance the book
     * @return Illuminate\Http\Response
     * **/
    public function update(Request $request, $book)
    {
        $this->successResponse($this->bookService->editbook($request->all(), $book));
    }

    /**
     * Removes an instance the book
     * @return Illuminate\Http\Response
     * **/
    public function destroy($book)
    {
        $this->successResponse($this->bookService->deletebook($book));
    }
}
