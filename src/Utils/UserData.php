<?php declare (strict_types=1);

namespace App\Utils;

use App\Utils\DataProvider;
use App\Service\User;
use App\Service\Address;
use App\Service\Company;

class UserData
{
    private $provider;
    private $users = [];
    
    public function __construct(DataProvider $provider)
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
            $this->provider->prepareData($index);
            
            $this->users[$index]['user'] = $this->getMainData();
            $this->users[$index]['address'] = $this->getAddressData();
            $this->users[$index]['company'] = $this->getCompanyData();
        }
        
        return $this->users;
    }
    
    private function getMainData(): User
    {
        $userData = $this->provider->getMainData();
        $user = new User(
            $userData['id'],
            $userData['name'],
            $userData['username'],
            $userData['email'],
            $userData['phone'],
            $userData['website']
        );
        
        return $user;
    }
    
    private function getAddressData(): Address
    {
        $addressData = $this->provider->getAddressData();
        $address = new Address(
            $addressData['street'],
            $addressData['suite'],
            $addressData['city'],
            $addressData['zipcode'],
            $addressData['geo'],
        );
        
        return $address;
    }
    
    private function getCompanyData(): Company
    {
        $companyData = $this->provider->getCompanyData();
        $company = new Company(
            $companyData['name'],
            $companyData['catchPhrase'],
            $companyData['bs']
        );
        
        return $company;
    }
}
