<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_REMEMBERED')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(QuestionRepository $questionRepository): Response
    {
        // Tri des questions par la plus récente à la plus ancienne
        $questions = $questionRepository->getQuestionsWithAuthor();

        return $this->render('home/index.html.twig', [
            //'questions' => HomeController::$questions,
            "questions" => $questions
        ]);
    }
}
