<?php declare (strict_types=1);

namespace App\Service;

class User
{
    private $id;
    private $name;
    private $username;
    private $email;
    private $phone;
    private $website;
    
    public function __construct(int $id, string $name, string $username, string $email, string $phone, string $website)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->website = $website;
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getUsername(): string
    {
        return $this->username;
    }
    
    public function getEmail(): string
    {
        return $this->email;
    }
    
    public function getPhone(): string
    {
        return $this->phone;
    }
    
    public function getWebsite(): string
    {
        return $this->website;
    }
}
