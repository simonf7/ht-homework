<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/", name="task")
     */
    public function index(Request $request)
    {
        $task_repo = $this->getDoctrine()->getRepository(Task::class);

        $form = $this->createForm(TaskType::class, new Task());
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('task');
        }

        return $this->render('task/index.html.twig', [
            'tasks'     => $task_repo->findAll(),
            'form'      => $form->createView()
        ]);
    }
}
