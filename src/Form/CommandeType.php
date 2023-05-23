<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Client;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
             
            ->add('date_commande')
            ->add('montant_total')
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'nom',
            ])
            ->add('produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true, // Utilisez cette option si vous souhaitez afficher les produits sous forme de cases à cocher
            ]);
          
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
