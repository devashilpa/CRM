<?php

namespace App\DataFixtures;

use App\Entity\Leads;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);


        $generator  = Factory::create("fr_FR");
        $categories = $manager->getRepository(Category::class)->findAll();

       
            $leads = new Leads();
            $leads->setName($generator->Name);        
            $leads->setPhonenumber($generator->phone_number);
            $leads->setEmailid($generator->email_id);
            $manager->persist($leads);
    



        $manager->flush();
        
    }
}
