<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
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

        for ($s = 1; $s < 4; $s++) {
            $season = new Season();
            $season->setProgram($program);
            $season->setNumber($s);
            $season->setYear(2010 + $s);
            $season->setDescription("Season " . $s);
            $manager->persist($season);
            
            for ($e = 1; $e < 4; $e++) {
                $episode = new Episode();
                $episode->setSeason($season);
                $episode->setTitle("Episode " . $e);
                $episode->setNumber($e);
                $episode->setSynopsis("Synopsis of episode " . $e);
                $manager->persist($episode);
            }
        }

        $manager->flush();
    }
}
