<?php

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ProductEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('descrip')
            ->add('categ', ChoiceType::class, [
                'choices' => [
                    'Épicerie salée' => 'Épicerie salée',
                    'Épicerie sucrée' => 'Épicerie sucrée',
                    'Boissons' => 'Boissons',
                    'Entretien' => 'Entretien',
                    'Bébé' => 'Bébé',
                    'Autre' => 'Autre',
                ],
                'attr' => [
                    'class' => '',
                ],
            ])
            ->add('imgPath', FileType::class, [
                'label' => "Votre image d'illustration :",
                'mapped' => false,
                'data_class' => null,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'imgage/gif',
                            'imgage/png',
                            'imgage/jpeg',
                            'imgage/jpg',
                        ],
                        'mimeTypesMessage' => 'Déposé une image au format valide (gif, png, jpeg et jpg).',
                    ])
                ],
            ])
            ->add('remove_image', CheckboxType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Supprimer l\'image actuelle',
                'help' => 'Cochez cette case pour supprimer l\'image actuelle et laisser le produit sans image.',
            ])
            ->add('price')
            ->add('promoBool')
            ->add('promoValue')
            ->add('promoPrice')
            ->add('creationDate', DateType::class, [
                'required' => false,
                'empty_data' => null,
                'html5' => false,
                ])
            ->add('endingDate', DateType::class, [
                'required' => false,
                'empty_data' => null,
                'html5' => false,
            ])
            ->add('Enregistrer', SubmitType::class, [
                'attr' => ['class' => 'btn']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
