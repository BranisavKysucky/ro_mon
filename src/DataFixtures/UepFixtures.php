<?php

namespace App\DataFixtures;

use App\Entity\Linka;
use App\Entity\Uep;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UepFixtures extends BaseFixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    protected function loadData(ObjectManager $manager)
    {
        /** @var Linka $hc */
        $hc = $this->getReference(Linka::class.'_0');
        /** @var Linka $mv */
        $mv = $this->getReference(Linka::class.'_1');
        /** @var Linka $log */
        $log = $this->getReference(Linka::class.'_2');

        $data = [
            ['HC0', $hc],
            ['HC1', $hc],
            ['HC2', $hc],
            ['GA', $hc],
            ['PdB', $hc],
            ['PP', $hc],
            ['KTP', $hc],
            ['HC3', $mv],
            ['MV1', $mv],
            ['MV2', $mv],
            ['MV3', $mv],
            ['MV4', $mv],
            ['PM', $mv],
            ['LOG 1', $log],
            ['LOG 2', $log],
        ];

        $this->createMany(
            Uep::class,
            count($data),
            function (Uep $uep, int $i) use ($data) {
                $uep->setNazov($data[$i][0])
                    ->setLinka($data[$i][1]);
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
