<?php

namespace App\Controllers;

use App\Controllers\MyController;

use Config\Services;

class Request extends MyController
{
	public function __construct()
	{
        $this->client = Services::curlrequest();
	}

	public function index()
	{
        $response = $this->client->request('POST', 'https://localhost/request.php', [
            'headers' => [
                'User-Agent'         => 'testing/1.0',
                'Accept'             => 'application/json',
                'X-Foo'              => ['Bar', 'Baz'],
                'X-Juhdi'            => ['Ahmad', 'Juhdi'],
                'Version'           => CURL_HTTP_VERSION_1_0,
                'X-Authorization'    => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUSEVfQ0xBSU0iLCJhdWQiOiJUSEVfQVVESUVOQ0UiLCJpYXQiOjE1OTkwMTIwMTMsIm5iZiI6MTU5OTAxMjAyMywiZXhwIjoxNTk5NjE2ODEzLCJkYXRhIjp7ImlkIjoiMiIsImZpcnN0bmFtZSI6IkFobWFkIiwibGFzdG5hbWUiOiJKdWhkaSIsImVtYWlsIjoiYWhtYWQuanVoZGlAdWxtLmFjLmlkIn19.D8F01ti3xnhfSM8TjTg7AbsgQvlJZr75tOIADGcuRUM',
            ],
            'auth' => ['ahmadjuhdi007@gmail.com', 'juhdi123'],
            'verify' => false,
            'query' => ['get' => 'data'],
            'multipart' => [
                'post' => 'data',
                'userfile' => new \CURLFile(WRITEPATH.'menu/superadmin.json'),
            ],
        ]);

        dd($response, $response->getBody());
    }

    public function login()
	{
        $response = $this->client->request('POST', 'http://localhost:8080/api/home', [
            'headers' => [
                'User-Agent' => 'testing/1.0',
                'Accept'     => 'application/json',
                'X-Foo'      => ['Bar', 'Baz'],
                'X-Juhdi'    => ['Ahmad', 'ads'],
                'X-Juhdii'    => ['Ahmad', 'Juhdi'],
            ],
            'auth' => ['ahmadjuhdi007@gmail.com', 'juhdi123'],
            'verify' => false,
            'query' => ['get' => 'data'],
            'multipart' => [
                'post' => 'data',
                'userfile' => new \CURLFile(WRITEPATH.'menu/superadmin.json'),
            ],
        ]);

        dd($response->getBody());
    }

}