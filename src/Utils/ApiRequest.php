<?php declare (strict_types=1);

namespace App\Utils;

use GuzzleHttp;

class ApiRequest
{
    private $request;
    
    public static function open(string $url): self
    {
        return new self($url);
    }
    
    private function __construct(string $url)
    {
        $client = new GuzzleHttp\Client();
        $this->request = $client->request('GET', $url);
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
