<?php


namespace App\Form;

use App\Entity\Parede;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParedeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('Largura', NumberType::class, ['label' => 'Largura','attr' => ['placeholder' => 'Largura da parede', 'class' => 'form-control', 'scale' => 2]])
            ->add('Altura',NumberType::class, ['label' => 'Altura', 'attr' => ['placeholder' => 'Altura da parede', 'class' => 'form-control']])
            ->add('portas', NumberType::class, ['label' => 'Quantidade de Portas', 'attr' => ['placeholder' => 'Quantidade de portas', 'class' => 'form-control']])
            ->add('janelas', NumberType::class, ['label' => 'Quantidade de Janelas', 'attr' => ['placeholder' => 'quantidade de janelas', 'class' => 'form-control']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Parede::class,
        ]);
    }

}