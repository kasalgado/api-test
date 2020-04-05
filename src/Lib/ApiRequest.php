<?php declare (strict_types=1);

namespace App\Lib;

use GuzzleHttp;

class ApiRequest
{
    const API_URL = 'https://jsonplaceholder.typicode.com/users';
    
    private $request;
    
    public function __construct()
    {
        $client = new GuzzleHttp\Client();
        $this->request = $client->request('GET', self::API_URL);
    }
    
    public function getStatus(): int
    {
        return $this->request->getStatusCode();
    }
    
    public function getHeader(): string
    {
        return $this->request->getHeader('content-type')[0];
    }
    
    public function getBody(): string
    {
        return $this->request->getBody()->getContents();
    }
}
