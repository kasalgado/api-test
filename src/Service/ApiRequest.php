<?php declare (strict_types=1);

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class ApiRequest
{
    const API_URL = 'https://jsonplaceholder.typicode.com/users';
    
    private $request;
    
    public function __construct()
    {
        $client = HttpClient::create();
        $this->request = $client->request('GET', self::API_URL);
    }
    
    public function getStatus(): int
    {
        return $this->request->getStatusCode();
    }
    
    public function getHeaders(): array
    {
        return $this->request->getHeaders();
    }
    
    public function getBody(): string
    {
        return $this->request->getContent();
    }
}
