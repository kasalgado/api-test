<?php declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Entity\LegalNotice;
use App\Form\Type\LegalNoticeType;

class LegalNoticeController extends AbstractController
{
    /**
     * @Route("/{language}/legal-notice", name="_legal_notice", requirements={"language"="de|en|es"})
     * @Template()
     */
    public function index(string $language): array
    {
        $legal = $this->getDoctrine()->getRepository(LegalNotice::class)->findOneBy([
            'language' => $language,
        ]);
        
        return [
            'legal' => $legal,
            'id' => $legal->getId(),
        ];
    }
    
    /**
     * @Route("/legal-notice/edit", name="_legal_notice_edit")
     * @Template()
     */
    public function edit(Request $request)
    {
        $id = $request->get('id');
        $legal = $this->getDoctrine()->getRepository(LegalNotice::class)->find($id);
        
        if (!$legal) {
            throw new NotFoundHttpException('Id '.$id.' was not found!');
        }
        
        $form = $this->createForm(LegalNoticeType::class, $legal);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($legal);
            $em->flush();
            
            return $this->redirect($this->generateUrl('_legal_notice', ['language' => $legal->getLanguage()]));
        }
        
        return [
            'form' => $form->createView(),
            'language' => $legal->getLanguage(),
            'id' => $id,
        ];
    }
}
