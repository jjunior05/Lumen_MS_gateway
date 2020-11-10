<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * The base uri to be used consume the authors service
     * @var strings
     */

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

    /**
     * Get the full list of authors from the books services.
     * @var strings
     */
    function obtainBooks()
    {
        $this->performRequest('GET', '/books');
    }
}
