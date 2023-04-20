<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AdduserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddUserController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function index(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(AdduserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRoles = $form->get('Users_Roles')->getData('role_name');
            foreach ($userRoles as $userRole) {
                $user->addUsersRole($userRole);
            }
            $this->em->persist($user);
            $this->em->flush();
        
            return $this->redirectToRoute('home');
        }


        return $this->render('user/adduser.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
