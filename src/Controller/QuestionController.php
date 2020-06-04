<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionController extends AbstractController
{
    /**
     * @Route("/questions", name="question")
     */
    public function index(QuestionRepository $questionRepository)
    {

        $title = "Liste des questions";
        $questions = $questionRepository->findBy([],['createdAt' => 'DESC']);

        return $this->render('question/index.html.twig', [
            'page_title' => $title,
            'page_subtitle' => 'Page subtitle',
            'questions' => $questions
        ]);
    }
    /**
     * @Route("/questions/{id}", name="show_question")
    */
    public function questionPage(Question $question)
    {
        return $this->render('question/question.html.twig', [
            'question' => $question,
        ]);
    }
    /**
     * @Route("/createquestion/", name="create_question")
    */
    public function createQuestion()
    {
        // creates a task object and initializes some data for this example
        $question = new question();
        $question->setCreatedAt(new \DateTime('now'));

        $form = $this->createForm(QuestionType::class, $question);

        return $this->render('question/create_question.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
