<?php

namespace App\Controller;

use App\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ClassPersonController
 * @package App\Controller
 * @Route("/person")
 */
class PersonController extends AbstractController
{
    /**
     * @Route("/", name="person_index", methods="GET")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) :Response
    {
        $person = $this->getDoctrine()->getRepository(Person::class)
            ->createQueryBuilder('p')
            ->getQuery()
            ->getArrayResult();
        
        if ($request->isXmlHttpRequest()) {
            return $this->json($person);
        }
    }
}