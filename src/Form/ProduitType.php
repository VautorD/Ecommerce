<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\LignePanier;
use App\Entity\Produit;
use App\Repository\CategorieRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Couleur')
            ->add('Type')
            ->add('Taille')
            ->add('Prix')
            ->add('Stock')
            ->add('Slug')
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'Nom',
                'label' => 'Catégorie',
                'group_by' => 'parent.Nom',
                'query_builder' => function(CategorieRepository $categorieRepository)
                {
                    return $categorieRepository->createQueryBuilder('c')
                        ->where('c.parent IS NOT NULL')
                        ->orderBy('c.Nom', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
