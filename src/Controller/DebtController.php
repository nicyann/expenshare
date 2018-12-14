<?php

namespace App\Controller;

use App\Entity\Debt;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * ClassPersonController
 * @package App\Controller
 * @Route("/debt")
 */
class DebtController extends AbstractController
{
    /**
     * @Route("/", name="debt_index", methods="GET")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) :Response
    {
        $debt = $this->getDoctrine()->getRepository(Debt::class)
            ->createQueryBuilder('d')
            ->getQuery()
            ->getArrayResult();
        
        if ($request->isXmlHttpRequest()) {
            return $this->json($debt);
        }
    }
}
