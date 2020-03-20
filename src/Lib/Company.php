<?php declare (strict_types=1);

namespace App\Lib;

class Company
{
    private $name;
    private $catchPhrase;
    private $bs;
    
    public static function create(string $name, string $catchPhrase, string $bs): self
    {
        return new self($name, $catchPhrase, $bs);
    }
    
    private function __construct($name, string $catchPhrase, string $bs)
    {
        $this->name = $name;
        $this->catchPhrase = $catchPhrase;
        $this->bs = $bs;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getCatchPhrase(): string
    {
        return $this->catchPhrase;
    }
    
    public function getBs(): string
    {
        return $this->bs;
    }
}
