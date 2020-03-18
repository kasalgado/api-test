<?php declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\LegalNotice;
use App\Form\Type\LegalNoticeType;

class LegalNoticeController extends AbstractController
{
    /**
     * @Route("/", name="_legal_notice")
     * @Route("/{language}/legal-notice", name="_legal_notice", requirements={"language"="de|en"})
     * @Template()
     */
    public function index(string $language): array
    {
        $legal = $this->getDoctrine()->getRepository(LegalNotice::class)->find($id);
        
        return [
            'legal' => $legal,
            'id' => $id,
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
        
        $form = $this->createForm(LegalNoticeType::class, $legal);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($legal);
            $em->flush();
            
            return $this->redirect($this->generateUrl('_legal_notice'));
        }
        
        return [
            'form' => $form->createView(),
            'id' => $id,
        ];
    }
}
