<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Tag;
use App\Entity\Answer;
use App\Entity\Category;
use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create('fr_FR');


        // Boucle de nombre de catégories
        for ($i=0; $i < 6; $i++) { 

            // Je créer une categorie
            $category = new Category();

            // J'attribue un faux nom à la categorie
            $category->setName($faker->word);
            
            // Je créer un tag
            $tag = new Tag();

            // J'attribue un mot à chaque tag
            $tag->setName($faker->word);

            // Boucle de nombre de questions
            for($nbQuestions=0; $nbQuestions < rand(10,20); $nbQuestions++) {

                // Je créer une question
                $questions = new Question();

                // J'attribue un faux titre à la question
                $questions->setTitle($faker->Text)

                // J'attribue une fausse date à la question
                ->setCreatedAt($faker->DateTime)
                // J'attribue une categorie à la question
                ->setCategory($category)
                // J'attribue un tag à la question
                ->setTag($tag);
                $manager->persist($questions);

                for ($i=1; $i <= 5; $i++) { 
                    // Je créer une réponse
                    $answer = new Answer();
                    
                    
                    // Bah c'est logique
                    $answer->setContent($faker->Text)
                    ->setDate($faker->DateTime)
                    ->setQuestion($questions);
                    $manager->persist($answer);
                }
            }
            $manager->persist($tag);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
