<?php

namespace AFC\RunningPlatformBundle\Controller;


use OC\PlatformBundle\Entity\Nutrition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NutritionController extends Controller
{
  public function addAction(Request $request){
    $nutrition = new Nutrition();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $nutrition);
        $formBuilder
        ->add('date',      DateType::class);
        $form = $formBuilder->getForm();
        return $this->render('AFCRunningPlatformBundle:Nutrition:add.html.twig', array(
        'form' => $form->createView(),

    ));
  }


}
