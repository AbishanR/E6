<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Chien;
use App\Entity\Style;
use App\Entity\Chat;
use App\Entity\Cheval;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker=Factory::create("fr_FR");

        $LesChats=$this->chargeFichier("Chat.csv");

        foreach ($LesChats as $value) {
            $chat= new Chat();
            $chat    ->setId(intval($value[0]))
                        ->setNom($value[1])
                        ->setPrix($value[2])
                        ->setDescription(join($faker->paragraphs(5)));
            $manager->persist($chat);
            $this->addReference("chat". $chat->getId(),$chat);
        }
        

        $LesChiens=$this->chargeFichier("Chien.csv");
        foreach ($LesChiens as $value) 
        {
            $chien=new Chien();
            $chien ->setId(intval($value[0]))
                   ->setNom($value[1])
                   ->setPrix($value[2])
                   ->setDescription(join($faker->paragraphs(5)));
                   $manager->persist($chien);
                   $this->addReference("Chien".$chien->getId(),$chien);
        }

        $LesChevaux=$this->chargeFichier("Cheval.csv");
        
        foreach ($LesChevaux as $value) 
        {
            $cheval=new Cheval();
            $cheval ->setId(intval($value[0]))
                   ->setNom($value[1])
                   ->setPrix($value[2])
                   ->setDescription(join($faker->paragraphs(5)));
                   $manager->persist($cheval);
                   $this->addReference("Cheval".$cheval->getId(),$cheval);
        }
        $manager->flush();
    }

    

    public function chargeFichier($fichier) 
    {
        $fichierCsv=fopen(__DIR__. "/". $fichier ,"r");
        while (!feof($fichierCsv)) {
            $data[] = fgetcsv($fichierCsv);
        }
        fclose($fichierCsv);
        return $data;
    }
}

