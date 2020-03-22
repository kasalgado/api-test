<?php declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Query;

use App\Entity\LegalNotice;

class ApiLegalNoticeController extends AbstractController
{
    /**
     * @Route("/api/legal-notice", name="_api_legal_notice", methods={"GET"})
     */
    public function findAll(): Response
    {
        try {
            $query = $this->getDoctrine()->getRepository(LegalNotice::class)->createQueryBuilder('l')->getQuery();
            $result = $query->getResult(Query::HYDRATE_ARRAY);
            $response = new Response();
            
            if ($result) {
                $response->setContent(json_encode(['data' => $result]));
            } else {
                $response->setContent(json_encode(['data' => 'No results found']));
            }
            
            $response->setStatusCode(Response::HTTP_OK);
            $response->headers->set('Content-Type', 'application/json');
            
            return $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
