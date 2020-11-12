


# Criar uma Trait em Traits/ConsumesExternalService.php
<?php
 
namespace App\Traits;
 
use GuzzleHttp\Client;
 
trait ConsumesExternalService
{
    /**
     * Send a request to any service
     */
 
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'baseUri' => $this->baseUri,
        ]);
 
        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);
 
        return $response->getBody()->getContents();
    }
}


# Services
Para começar a trabalhar com o gateway.

No projeto, criar uma pasta "Config/services.php".

Registrar em bootstrap/app.php

config/services.php

<?php
 
return [];        
bootstrap/app.php

/**
 * Registering config files
 */
$app->configure('services');

### Gateway Security

## Registrar camada de segurança na arquitetura de micro serviços 


# Lumen Passport

Lumen Passport

Habilitar em bootstrap/app.php

$app->register(App\Providers\AuthServiceProvider::class);
 
$app->register(Laravel\Passport\PassportServiceProvider::class);
$app->register(Dusterio\LumenPassport\PassportServiceProvider::cla

no novo arquivo auth.php

'guards' => [
        'api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],
 
 
    'providers' => [
        'users' => [
            'drivers' => 'eloquent',
            'model' => App\User::class,
        ]

Criar em config/auth.php

Copiar o conteúdo de vendor/laravel/Lumen-framework/config/auth.php


Registrar no Providers/AuthServiceProvider.php

public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        // $this->app['auth']->viaRequest('api', function ($request) {
        //     if ($request->input('api_token')) {
        //         return User::where('api_token', $request->input('api_token'))->first();
        //     }
        // });

        LumenPassport::routes($this->app->router);
    }

## Configurando Middleware
$app->routeMiddleware([
    'cliente.credentials' =>Laravel\Passport\Http\Middleware\CheckClientCredentials::class,
]);


