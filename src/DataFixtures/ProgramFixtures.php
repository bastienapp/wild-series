<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('With Dragon');
        $manager->persist($category);

        $program = new Program();
        $program->setTitle('Game of Thrones');
        $program->setPoster('https://m.media-amazon.com/images/M/MV5BYTRiNDQwYzAtMzVlZS00NTI5LWJjYjUtMzkwNTUzMWMxZTllXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_FMjpg_UX1000_.jpg');
        $program->setSummary('Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.');
        $program->setCategory($category);
        $manager->persist($program);

        $manager->flush();
    }
}
