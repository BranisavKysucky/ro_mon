<?php

namespace App\Form;

use App\Entity\Uep;
use App\Entity\Zaznam;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZaznamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('den', DateType::class, ["widget" => "single_text", "format" => "dd-MM-yyyy"])
                ->add('zmena', TextType::class)
                ->add('nadcas', NumberType::class)
                ->add('uep', EntityType::class, ['class' => Uep::class])
                ->add('pocet_vyrobenych', NumberType::class)
                ->add('suma_pracovnikov_monitor', NumberType::class)
                ->add('suma_pracovnikov_operator', NumberType::class)
                ->add('pn_lekar_monitor', NumberType::class)
                ->add('pn_lekar_operator', NumberType::class)
                ->add('dovolenka_nv_monitor', NumberType::class)
                ->add('dovolenka_nv_operator', NumberType::class)
                ->add('ine_monitor', NumberType::class)
                ->add('ine_operator', NumberType::class)
                ->add('skolenie_monitor', NumberType::class)
                ->add('skolenie_operator', NumberType::class)
                ->add('pozicany_monitor', NumberType::class)
                ->add('pozicany_operator', NumberType::class)
                ->add('vypozicany_monitor', NumberType::class)
                ->add('vypozicany_operator', NumberType::class)
                ->add('nadcas_druha_zmena_monitor', NumberType::class)
                ->add('nadcas_druha_zmena_operator', NumberType::class)
                ->add('neobsadene_moduly_monitor', NumberType::class)
                ->add('zastavenia_fab_info', TextType::class, ['empty_data' => ''])
                ->add('zastavenia_fab_pocet', NumberType::class)
                ->add('udrzba_info', TextType::class, ['empty_data' => ''])
                ->add('udrzba_pocet', NumberType::class)
                ->add('logistika_info', TextType::class, ['empty_data' => ''])
                ->add('logistika_pocet', NumberType::class)
                ->add('saturacia_info', TextType::class, ['empty_data' => ''])
                ->add('saturacia_pocet', NumberType::class)
                ->add('nedostatok_info', TextType::class, ['empty_data' => ''])
                ->add('nedostatok_pocet', NumberType::class)
                ->add('pocet_zastaveni_info', TextType::class, ['empty_data' => ''])
                ->add('pocet_zastaveni', NumberType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class'      => Zaznam :: class,
                'csrf_protection' => false,
                'empty_data'      => new Zaznam(),
            ]
        );
    }

    public function getBlockPrefix()
    {
        return "";
    }
}
