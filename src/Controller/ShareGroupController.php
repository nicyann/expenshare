<?php

namespace App\Controller;


use App\Entity\ShareGroup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ClassPersonController
 * @package App\Controller
 * @Route("/sharegroup")
 */
class ShareGroupController extends AbstractController
{
    /**
     * @Route("/", name="sharegroup_index", methods="GET")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) :Response
    {
        $sharegroup = $this->getDoctrine()->getRepository(ShareGroup::class)
            ->createQueryBuilder('s')
            ->getQuery()
            ->getArrayResult();
        
        if ($request->isXmlHttpRequest()) {
            return $this->json($sharegroup);
        }
    }
}
