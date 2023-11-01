<?php

namespace App\Controller;

use App\Service\CagnotteManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    public function __construct(private CagnotteManager $cagnotteManager)
    {
        $this->cagnotteManager = $cagnotteManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $this->cagnotteManager->createCagnotteIfNeeded();

        return $this->render('home/index.html.twig', []);
    }
}
