<?php

namespace App\DataFixtures;

use App\Entity\Ciel;
use App\Entity\Linka;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CielFixtures extends BaseFixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    protected function loadData(ObjectManager $manager)
    {
        $data = [$this->getReference(Linka::class.'_0'), $this->getReference(Linka::class.'_1')];

        $this->createMany(
            Ciel::class,
            count($data),
            function (Ciel $ciel, int $i) use ($data) {
                $ciel->setLinka($data[$i])
                     ->setPlatnostOd(new \DateTime())
                     ->setCielTeoretickaVyroba(500.5)
                     ->setCielRO(0.90)
                     ->setCielEfektivita(0.85);
            }
        );

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [LinkaFixtures::class];
    }
}
