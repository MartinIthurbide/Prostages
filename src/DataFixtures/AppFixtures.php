<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Creation de générateur de données
        $faker = \Faker\Factory::create('fr_FR');
        $nombreOccurence = 10; // initialisation du nombre de peuplement à faire





        // ENTREPRISES
        for ($i=0; $i < $nombreOccurence ; $i++) { 
            $entreprise = new Entreprise(); 
            $nomEntreprise = $faker->company(); // Initialisation des noms d'entreprise aléatoire
            $entreprise->setNom($nomEntreprise); // Définition des noms d'entreprises
            $entreprise->setSiteWeb($faker->regexify('https://www\.'.$nomEntreprise.'\.fr')); // création d'un lien sur le site web avec le nom de l'entreprise
            $entreprise->setActivite($faker->realText($maxNbChars = 100, $indexSize = 2)); // génération de texte aléatoire
            $entreprise->setAdresse($faker->address()); // génération d'une adresse aléatoire
            $manager->persist($entreprise);
        }




        // FORMATIONS

         // Ajout des différents noms de formation
        
         $nomDesFormations = array(
             // création des formations ainsi que leurs noms longs et courts
            "DUT Info" => "DUT Information",
            "DUT GIM" => "DUT Génie Industriel et Maintenance",
            "DUT GEA" => "DUT Gestion des Entreprises et des Administrations"
            );

        foreach ($nomDesFormations as $nomCourt => $nomLong) {
            $formation = new Formation(); 
            $formation->setNomLong($nomLong); //association du nom long défini dans la création des formations
            $formation->setNomCourt($nomCourt); //association du nom court défini dans la création des formations
            $manager->persist($formation);
        }



        // STAGE
        $typesDeStages = array(
            // création des types de stages recherchés
           "Developpeur web Front-End",
           "Developpeur web Back-End",
           "Developpeur full-stack",
           "Administration de base de données",
           "Programmeur Objet"
           );

       foreach ($typesDeStages as $titre) {
           $stage = new Stage(); 
           $stage->setTitre($titre); //association dutype de stage défini dans la création ci dessus
           $stage->setDescription($faker->realText($maxNbChars = 150, $indexSize = 2)); // utilisation du faker pour une description aléatoire
           $stage->setEmail($faker->email()); // génération d'un mail aléatoire
           $stage->setEntreprise($entreprise); // liens vers l'id de la classe entreprise et affiche son id
           $stage->addFormation($formation); // liens vers l'id de la classe formation et affiche son id
           $manager->persist($stage);
       }


       
     $manager->flush();     
    }

}
