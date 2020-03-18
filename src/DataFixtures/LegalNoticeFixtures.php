<?php declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\LegalNotice;

class LegalNoticeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $datetime = new \DateTime();
        
        $legal = new LegalNotice();
        $legal->setContent('<h1>Legal Notice</h1>');
        $legal->setUpdatedAt($datetime);
        $manager->persist($legal);
        
        $manager->flush();
    }
}
