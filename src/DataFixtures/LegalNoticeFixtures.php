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
        $legal->setContent('<h1>Imprint</h1><hr><p><b>Management:</b> Markus Mustermann</p><p><b>CEO-IT:</b> Sebastian Bergmann</p>');
        $legal->setUpdatedAt($datetime);
        $legal->setLanguage('en');
        $manager->persist($legal);
        
        $legal = new LegalNotice();
        $legal->setContent('<h1>Impressum</h1><hr><p><b>Geschätsführung:</b> Markus Mustermann</p><p><b>CEO-IT:</b> Sebastian Bergmann</p>');
        $legal->setUpdatedAt($datetime);
        $legal->setLanguage('de');
        $manager->persist($legal);
        
        $legal = new LegalNotice();
        $legal->setContent('<h1>Sobre nosotros</h1><hr><p><b>Gerencia:</b> Markus Mustermann</p><p><b>CEO-IT:</b> Sebastian Bergmann</p>');
        $legal->setUpdatedAt($datetime);
        $legal->setLanguage('es');
        $manager->persist($legal);
        
        $manager->flush();
    }
}
