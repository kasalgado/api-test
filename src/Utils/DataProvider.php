<?php declare (strict_types=1);

namespace App\Utils;

class DataProvider
{
    private $data;
    private $mainData;
    private $infoData;
    private $addressData;
    private $companyData;

    public function generate(string $json): void
    {
        try {
            $this->data = json_decode($json, true);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function prepareData(int $index): void
    {
        foreach ($this->data[$index] as $key => $value) {
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
    
    public function getMainData(): array
    {
        return $this->mainData;
    }
    
    public function getAddressData(): array
    {
        return $this->addressData;
    }
    
    public function getCompanyData(): array
    {
        return $this->companyData;
    }
}
