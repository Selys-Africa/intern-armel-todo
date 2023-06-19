<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints as Assert;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'attr' => [
                    'class' => 'form-control p-2',
                    'style' => 'border:none;height:50px;background-color:#eee',
                    'minlenght' => '2',
                    'maxlenght' => '10',
                    'placeholder' => 'Votre tache'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank,
                    new Assert\Length(['min' => 2,'max' => 1000, 'minMessage' => "minErrorMessage",'maxMessage'=> "MaxErrorMessage"])
                ]
            ])

            
            ->add('submit',SubmitType::class,[
                'attr' => [
                    'class' => 'form-control p-2',
                    'style' => 'height:50px;background-color:blue;color:white',
                ],
                'label' => '+',
                
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
