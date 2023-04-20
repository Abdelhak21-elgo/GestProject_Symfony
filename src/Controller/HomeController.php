<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HomeController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    // #[Route('/', name: 'home')]
    public function index(): Response
    {
        // $serializer = Serializer::create()->build();
        $repository = $this->em->getRepository(User::class);

        $users = $repository->findAll();

        // dd($users);
        return $this->render(
            'home/index.html.twig',
            array('users' => $users)
        );
    }

    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function delete($id)
    {

        $user = $this->em->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException('No user found for id ' . $id);
        }

        $this->em->remove($user);
        $this->em->flush();

        $this->addFlash('success', 'User deleted successfully!');

        return $this->redirectToRoute('home');
    }
}
