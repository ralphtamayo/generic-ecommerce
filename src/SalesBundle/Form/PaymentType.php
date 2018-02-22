<?php

namespace SalesBundle\Form;

use SalesBundle\Entity\Payment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('paymentMode', Type\ChoiceType::class, array(
				'choices' => array(
					Payment::PAYMENT_MODE_BDO => Payment::PAYMENT_MODE_BDO,
					Payment::PAYMENT_MODE_CEBUANA => Payment::PAYMENT_MODE_CEBUANA,
				),
			))
			->add('cardNumber', Type\TextType::class)
			->add('expirationMonth', Type\TextType::class)
			->add('expirationYear', Type\TextType::class)
			->add('referenceNumber', Type\TextType::class)
		;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'SalesBundle\Entity\Payment'
		));
	}

	public function getBlockPrefix()
	{
		return 'salesbundle_payment';
	}
}