<?php declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use App\Service\ApiRequest;
use App\Utils\UserData;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="_user")
     * @Template()
     */
    public function index(UserData $userData, ApiRequest $api): array
    {
        $userData->provider()->generate($api->getBody());
        
        return [
            'data' => $userData->getUsers(),
        ];
    }
}
