<?php

namespace App\DataFixtures;

use App\Entity\Ciel;
use App\Entity\Linka;
use App\Entity\Uep;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CielFixtures extends BaseFixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    protected function loadData(ObjectManager $manager)
    {
        $data = [
            ['HC0', 67, 0.96, 0.96],
            ['HC1', 67, 0.96, 0.96],
            ['HC2', 67, 0.96, 0.96],
            ['GA', 67, 0.96, 0.96],
            ['PB', 67, 0.96, 0.975],
            ['PP', 67, 0.96, 0.998],
            ['KPP', 67.5, 0.96, 0.995],
            ['HC3', 66, 0.96, 0.975],
            ['MV1', 66, 0.96, 0.975],
            ['MV2', 66.5, 0.96, 0.97],
            ['MV3', 66.5, 0.96, 0.97],
            ['MV4', 65.5, 0.96, 0.975],
            ['PM', 67, 0.96, 0.96],
            ['LOG 1', 67, 0.96, 0.96],
            ['LOG 2', 67, 0.96, 0.96],
        ];

        $this->createMany(
            Ciel::class,
            count($data),
            function (Ciel $ciel, int $i) use ($data) {
                /** @var Uep $uep */
                $uep = $this->getReference(Uep::class.'_'.$i);

                $ciel->setUep($uep)
                     ->setPlatnostOd(new \DateTime())
                     ->setCielHodinovaVyroba($data[$i][1])
                     ->setCielRo($data[$i][2])
                     ->setCielEfektivita($data[$i][3]);
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
        return [UepFixtures::class];
    }
}
