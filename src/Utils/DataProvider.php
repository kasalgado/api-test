<?php declare (strict_types=1);

namespace App\Utils;

class DataProvider
{
    private $data;
    private $mainData;
    private $infoData;
    private $addressData;
    private $companyData;

    public static function createFromJson(string $json): self
    {
        return new self($json);
    }
    
    private function __construct(string $json)
    {
        $this->check($json);
    }
    
    private function check(string $json): void
    {
        try {
            $this->data = json_decode($json, true);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }        
    }
    
    private function prepareData(int $index): void
    {
        $data = $this->data[$index];
        
        foreach ($data as $key => $value) {
            if (!is_array($value)) {
                $this->mainData[$key] = $value;
            } else {
                $this->infoData[$key] = $value;
            }
        }
        
        $this->addressData = $this->infoData['address'];
        $this->companyData = $this->infoData['company'];
    }
    
    public function asArray(): array
    {
        return $this->data;
    }
    
    public function getMainData(int $index): array
    {
        $this->prepareData($index);
        
        return $this->mainData;
    }
    
    public function getAddressData(int $index): array
    {
        $this->prepareData($index);
        
        return $this->addressData;
    }
    
    public function getCompanyData(int $index): array
    {
        $this->prepareData($index);
        
        return $this->companyData;
    }
}
