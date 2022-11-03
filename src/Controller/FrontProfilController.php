<?php

namespace App\Controller;

use App\Form\UserType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FrontProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_front_profil')]
    public function index(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        //On récupère l'utilisateur connecté
        $user=$this->getUser();
        $form = $this->createForm(UserType::class, $user);

        //On hydrate le formulaire avec les données de la requête
        $form->handleRequest($request);

        //si le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
            // On traite le plainPassword si nécessaire
            if($form->get('plainPassword')->getdata()){
                $encodedPassword = $userPasswordHasherInterface->hashPassword($user, $form->get('plainPassword')->getData());
                $user->setPassword($encodedPassword);
            }

            // On récupère l'entité User
            $user = $form->getData();
            // On persiste l'entité
            $em->persist($user);
            // On flush
            $em->flush();
            // On ajoute un message flash
            $this->addFlash('success', 'Votre profil a bien été mis à jour.');
            // On redirige vers la page de profil (obligatoire àprès le flush)
            return $this->redirectToRoute('app_front_profil');
        }

        return $this->render('front_profil/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/favorite', name: 'app_front_favorite', methods:['POST'])]
    public function favorite(Request $request, EntityManagerInterface $em, BookRepository $bookRepository): Response{
        // On récupère le livre
        $idLivre = $request->request->get('id');
        $book = $bookRepository->find($idLivre);
        //on récupère l'utilisateur et lui ajouter un livre
        $user = $this->getUser();
        $user->addBook($book);
        //on persiste l'entité et on flush
        $em->persist($user);
        $em->flush();
        //
        return new Response("ok");
    }

    #[Route('/remove-favorite', name: 'app_front_remove-favorite', methods:['POST'])]
    public function removeFavorite(Request $request, EntityManagerInterface $em, BookRepository $bookRepository): Response{
        // On récupère le livre
        $idLivre = $request->request->get('id');
        $book = $bookRepository->find($idLivre);
        //on récupère l'utilisateur et lui ajouter un livre
        $user = $this->getUser();
        $user->removeBook($book);
        //on persiste l'entité et on flush
        $em->persist($user);
        $em->flush();
        //
        return new Response("ok");
    }

}
