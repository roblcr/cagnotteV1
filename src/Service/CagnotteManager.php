<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cagnotte;
use App\Repository\CagnotteRepository;

class CagnotteManager
{

    public function __construct(private EntityManagerInterface $entityManager, private CagnotteRepository $cagnotteRepository)
    {
        $this->entityManager = $entityManager;
        $this->cagnotteRepository = $cagnotteRepository;
    }

    public function createCagnotteIfNeeded()
    {
        $currentCagnotte = $this->cagnotteRepository->findOneBy([]);

        if (!$currentCagnotte) {
            // Créez une nouvelle cagnotte si pas de cagnotte. (au lancement de l'application)
            $newCagnotte = new Cagnotte();
            $newCagnotte->setCurrentAmount(0);
            $newCagnotte->setThreshold(10); // Plafond de 10 euros
            $newCagnotte->setCreationDate(new \DateTime());

            $this->entityManager->persist($newCagnotte);
            $this->entityManager->flush();
        } elseif ($currentCagnotte->getCurrentAmount() >= $currentCagnotte->getThreshold()) {
            // Si le plafond est atteint, créez une nouvelle cagnotte
            $newCagnotte = new Cagnotte();
            $newCagnotte->setCurrentAmount(0);
            $newCagnotte->setThreshold(10); // Plafond de 10 euros
            $newCagnotte->setCreationDate(new \DateTime());

            $this->entityManager->persist($newCagnotte);
            $this->entityManager->flush();
        }
    }
}
