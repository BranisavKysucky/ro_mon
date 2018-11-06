<?php

namespace App\DataFixtures;

use App\Entity\Linka;
use Doctrine\Common\Persistence\ObjectManager;

class LinkaFixtures extends BaseFixture
{
    /**
     * @param ObjectManager $manager
     */
    protected function loadData(ObjectManager $manager)
    {
        $data = ['HC', 'MV'];

        $this->createMany(
            Linka::class,
            count($data),
            function (Linka $linka, int $i) use ($data) {
                $linka->setNazov($data[$i]);
            }
        );

        $manager->flush();
    }
}
