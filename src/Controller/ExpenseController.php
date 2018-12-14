<?php

namespace App\Controller;

use App\Entity\Expense;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ClassPersonController
 * @package App\Controller
 * @Route("/expense")
 */
class ExpenseController extends AbstractController
{
    /**
     * @Route("/", name="expense_index", methods="GET")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $expense = $this->getDoctrine()->getRepository(Expense::class)
            ->createQueryBuilder('e')
            ->getQuery()
            ->getArrayResult();
        
        if ($request->isXmlHttpRequest()) {
            return $this->json($expense);
        }
    }
}
