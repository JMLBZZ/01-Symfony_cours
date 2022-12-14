<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/book-page')]
class AdminBookController extends AbstractController
{
    #[Route('/', name: 'app_admin_book_index', methods: ['GET'])]
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render('admin_book/index.html.twig', [
            'books' => $bookRepository->findBy([], ["id"=>"DESC"]),
        ]);
    }

    #[Route('/new', name: 'app_admin_book_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BookRepository $bookRepository, SluggerInterface $sluggerInterface): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $book->setSlug($sluggerInterface->slug(strtolower($book->getTitle())));
            $bookRepository->save($book, true);

            return $this->redirectToRoute('app_admin_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_book/new.html.twig', [
            'book' => $book,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_book_show', methods: ['GET'])]
    public function show(Book $book): Response
    {
        return $this->render('admin_book/show.html.twig', [
            'book' => $book,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_book_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Book $book, BookRepository $bookRepository): Response
    {
        $form = $this->createForm(BookType::class, $book, ["imageRequired"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bookRepository->save($book, true);

            return $this->redirectToRoute('app_admin_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_book/edit.html.twig', [
            'book' => $book,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_book_delete', methods: ['POST'])]
    public function delete(Request $request, Book $book, BookRepository $bookRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$book->getId(), $request->request->get('_token'))) {
            $bookRepository->remove($book, true);
        }

        return $this->redirectToRoute('app_admin_book_index', [], Response::HTTP_SEE_OTHER);
    }
}
