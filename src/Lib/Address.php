<?php declare (strict_types=1);

namespace App\Lib;

class Address
{
    private $street;
    private $suite;
    private $city;
    private $zipcode;
    private $geo;
    
    public static function create(string $street, string $suite, string $city, string $zipcode, array $geo): self
    {
        return new self($street, $suite, $city, $zipcode, $geo);
    }
    
    private function __construct($street, string $suite, string $city, string $zipcode, array $geo)
    {
        $this->street = $street;
        $this->suite = $suite;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->geo = $geo;
    }
    
    public function getStreet(): string
    {
        return $this->street;
    }
    
    public function getSuite(): string
    {
        return $this->suite;
    }
    
    public function getCity(): string
    {
        return $this->city;
    }
    
    public function getZipcode(): string
    {
        return $this->zipcode;
    }
    
    public function getGeo(): array
    {
        return $this->geo;
    }
}
