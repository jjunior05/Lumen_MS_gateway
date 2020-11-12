<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * The base uri to be used consume the Books service
     * @var strings
     */
    public $baseUri;

    /**
     * The secret to be used consume the Books service
     * @var strings
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    /**
     * Get the full list of Books from the books services.
     * @var strings
     */
    function obtainBooks()
    {
        $this->performRequest('GET', '/books');
    }

    /**
     * Create an instance of Book using the Books services
     * @return strings
     */
    function createBooks($data)
    {
        $this->performRequest('POST', '/books', $data);
    }

    /**
     * Get a single Books from the Books service
     * @return string
     */
    function obtainBook($book)
    {
        $this->performRequest('GET', "/Books/{$book}");
    }

    /**
     * Edit a instance of the Books from the Books service
     * @return string
     */
    function editBook($data, $book)
    {
        $this->performRequest('PUT', "/Books/{$book}", $data);
    }

    /**
     * Edit a instance of the Books from the Books service
     * @return string
     */
    function deleteBook($book)
    {
        $this->performRequest('DELETE', "/Books/{$book}");
    }
}
