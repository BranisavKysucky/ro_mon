<?php

namespace App\Form ;
use App\Entity\Zaznam;
use Symfony\Component\Form\Extension\Core\Type\TextType ;
use Symfony\Component\Form\Extension\Core\Type\DateType ;
use Symfony\Component\Form\Extension\Core\Type\NumberType ;
use Symfony\Component\Form\AbstractType ;
use Symfony\Component\Form\FormBuilderInterface ;
use Symfony\Component\OptionsResolver\OptionsResolver ;

class ZaznamType extends AbstractType
{
    public function buildForm ( FormBuilderInterface $builder , array $options )
    {
        $builder
            ->add('den', DateType::class, ["widget"=>"single_text","format"=>"dd-MM-yyyy"])
            // -> add('den' ,TextType :: class )
            -> add('linka' ,TextType :: class )
            -> add('zmena' ,TextType  :: class )
            -> add('nadcas' ,NumberType :: class )
            -> add('uep' ,TextType :: class )
            -> add('suma_pracovnikov_monitor' ,NumberType :: class )
            -> add('suma_pracovnikov_operator' ,NumberType :: class )
            -> add('pn_lekar_monitor' ,NumberType :: class )
            -> add('pn_lekar_operator' ,NumberType :: class )
            -> add('dovolenka_nv_monitor' ,NumberType :: class )
            -> add('dovolenka_nv_operator' ,NumberType :: class )
            -> add('ine_monitor' ,NumberType :: class )
            -> add('ine_operator' ,NumberType :: class )
            -> add('skolenie_monitor' ,NumberType :: class )
            -> add('skolenie_operator' ,NumberType :: class )
            -> add('pozicany_monitor' ,NumberType :: class )
            -> add('pozicany_operator' ,NumberType :: class )
            -> add('vypozicany_monitor' ,NumberType :: class )
            -> add('vypozicany_operator' ,NumberType :: class )
            -> add('nadcas_2_zmeny_monitor' ,NumberType :: class )
            -> add('nadcas_2_zmeny_operator' ,NumberType :: class )
            -> add('zastavenia_text_fab' ,TextType :: class, ['empty_data' => ''])
            -> add('zastavenia_int_fab' ,NumberType :: class )
            -> add('udrzba_text' ,TextType :: class, ['empty_data' => ''])
            -> add('udrzba_int' ,NumberType :: class )
            -> add('logistika_text' ,TextType :: class, ['empty_data' => ''])
            -> add('logistika_int' ,NumberType :: class )
            -> add('saturacia_text' ,TextType :: class, ['empty_data' => ''])
            -> add('saturacia_int' ,NumberType :: class )
            -> add('nedostatok_text' ,TextType :: class, ['empty_data' => ''])
            -> add('nedostatok_int' ,NumberType :: class );
    }

    public function configureOptions ( OptionsResolver $resolver )
    {
        $resolver -> setDefaults ( array (
            'data_class' => Zaznam :: class ,
            'csrf_protection' => false,
            'empty_data' => new Zaznam(),
        ));
    }

    public function getBlockPrefix()
    {
        return "";
    }
}