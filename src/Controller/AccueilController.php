<?php

namespace App\Controller;


use App\Repository\UserRepository;
use App\Repository\AssuranceRepository;
use App\Repository\SurccusaleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
        public function __construct(private EntityManagerInterface $em,
        private AssuranceRepository $AssuranceRepository,
        private UserRepository $UserRepository,
        private SurccusaleRepository $SurccusaleRepository
        )
    {}

    #[Route('admin', name: 'app_accueil')]
    public function index( ): Response
    {
        $assurances = count($this->AssuranceRepository->findAll());
        $users = count($this->UserRepository->findAll());
        $Surccusales = count($this->SurccusaleRepository->findAll());
        return $this->render('accueil/index.html.twig', [
            'users' => $users,
            'assurances' => $assurances,
            'surccusales' => $Surccusales,
        ]);
    }
}
