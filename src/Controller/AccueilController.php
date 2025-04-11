<?php

namespace App\Controller;


use App\Repository\UserRepository;
use App\Repository\AssuranceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
        public function __construct(private EntityManagerInterface $em,
        private AssuranceRepository $AssuranceRepository,
        private UserRepository $UserRepository
        )
    {}

    #[Route('/accueil', name: 'app_accueil')]
    public function index( ): Response
    {
        $assurances = count($this->AssuranceRepository->findAll());
        $users = count($this->UserRepository->findAll());
        return $this->render('accueil/index.html.twig', [
            'users' => $users,
            'assurances' => $assurances,
        ]);
    }
}
