<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;
    /**
     * The base uri to be used consuume the authors service
     * @var strings
     */

    public $baseUri;

    public function __construct()
    {
        //consumindo a base_uri do ConsumesExternalService com a variável config.service
        $this->baseUri = config('services.authors.base_uri');
    }

    /**
     * Get the full list of authors from the authors services.
     * @var strings
     */
    function obtainAuthors()
    {
        $this->performRequest('GET', '/authors');
    }

    /**
     * Create an instance of author using the authors services
     * @return string
     */
    function createAuthors($data)
    {
        $this->performRequest('POST', '/authors', $data);
    }

    /**
     * Get a single authors from the authors service
     * @return string
     */
    function obtainAuthor($author)
    {
        $this->performRequest('GET', "/authors/{$author}");
    }

    /**
     * Edit a instance of the authors from the authors service
     * @return string
     */
    function editAuthor($data, $author)
    {
        $this->performRequest('PUT', "/authors/{$author}", $data);
    }

    /**
     * Edit a instance of the authors from the authors service
     * @return string
     */
    function deleteAuthor($author)
    {
        $this->performRequest('DELETE', "/authors/{$author}");
    }
}
