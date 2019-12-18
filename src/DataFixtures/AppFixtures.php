<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $entrepriseUbisoft = new Entreprise();
        $entrepriseUbisoft->setNom("Ubisoft");
        $entrepriseUbisoft->setSiteWeb("https://www.ubisoft.com/fr-fr/");
        $entrepriseUbisoft->setActivite("Concepteur de jeux vidéos");
        $entrepriseUbisoft->setAdresse("114 Rue Lucien Faure, 33300 Bordeaux");
        $manager->persist($entrepriseUbisoft);

        $manager->flush();
    }
}
