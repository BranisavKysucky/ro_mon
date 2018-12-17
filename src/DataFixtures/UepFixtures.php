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
            ['HC0', $hc, 3],
            ['HC1', $hc, 3],
            ['HC2', $hc, 3],
            ['GA', $hc, 4],
            ['PdB', $hc, 2],
            ['PP', $hc, 4],
            ['KTP', $hc, 3],
            ['HC3', $mv, 3],
            ['MV1', $mv, 4],
            ['MV2', $mv, 3],
            ['MV3', $mv, 3],
            ['MV4', $mv, 2],
            ['PM', $mv, 3],
            ['LOG 1', $log, 3],
            ['LOG 2', $log, 3],
        ];

        $this->createMany(
            Uep::class,
            count($data),
            function (Uep $uep, int $i) use ($data) {
                $uep->setNazov($data[$i][0])
                    ->setLinka($data[$i][1])
                    ->setPocetModulovMonitor($data[$i][2]);
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
