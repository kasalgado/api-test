<?php declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use App\Utils\ApiRequest;
use App\Utils\DataProvider;
use App\Utils\UserData;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="_user")
     * @Template()
     */
    public function index(Request $request): array
    {
        $data = [];
        $apiUrl = 'https://jsonplaceholder.typicode.com/users';
        $client = ApiRequest::open($apiUrl);
        $provider = DataProvider::createFromJson($client->getBody());
        $userData = UserData::createFromProvider($provider);
        
        return [
            'data' => $userData->getUsers(),
        ];
    }
}
