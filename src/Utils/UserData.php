<?php declare (strict_types=1);

namespace App\Utils;

use App\Utils\DataProvider;
use App\Lib\User;
use App\Lib\Address;
use App\Lib\Company;

class UserData
{
    private $provider;
    private $users = [];
    
    public static function createFromProvider(DataProvider $provider): self
    {
        return new self($provider);
    }
    
    private function __construct(DataProvider $provider)
    {
        $this->provider = $provider;
    }
    
    public function provider(): DataProvider
    {
        return $this->provider;
    }
    
    public function getUsers(): array
    {
        foreach ($this->provider->asArray() as $index => $value) {
            $this->users[$index]['user'] = $this->getUser($index);
            $this->users[$index]['address'] = $this->getAddress($index);
            $this->users[$index]['company'] = $this->getCompany($index);
        }
        
        return $this->users;
    }
    
    public function getUser(int $index): User
    {
        $userData = $this->provider->getMainData($index);
        
        return User::create(
            $userData['id'],
            $userData['name'],
            $userData['username'],
            $userData['email'],
            $userData['phone'],
            $userData['website']
        );
    }
    
    public function getAddress(int $index): Address
    {
        $addressData = $this->provider->getAddressData($index);
        
        return Address::create(
            $addressData['street'],
            $addressData['suite'],
            $addressData['city'],
            $addressData['zipcode'],
            $addressData['geo'],
        );
    }
    
    public function getCompany(int $index): Company
    {
        $companyData = $this->provider->getCompanyData($index);
        
        return Company::create($companyData['name'], $companyData['catchPhrase'], $companyData['bs']);
    }
}
