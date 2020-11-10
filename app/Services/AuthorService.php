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
}
