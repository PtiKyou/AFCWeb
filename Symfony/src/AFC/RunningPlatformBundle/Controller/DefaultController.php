<?php
# TEST
namespace AFC\RunningPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AFCRunningPlatformBundle:Default:index.html.twig');
    }

    /**
    ** Barre de Navigation
    **/
    public function menuAction()
    {

      $listMenusLeft = array(
        array('id' => 1, 'title' => 'Profil'),
        array('id' => 2, 'title' => 'Stats'),
        array('id' => 3, 'title' => 'Social'),
        array('id' => 4, 'title' => 'admin')
      );

      $listMenusRight = array(
        array('id' => 1, 'title' => 'Login'),
        array('id' => 2, 'title' => 'Signup'),
        array('id' => 3, 'title' => 'Logout')
      );

      return $this->render('AFCRunningPlatformBundle:Default:menu.html.twig', array(
        'listMenusLeft' => $listMenusLeft, 'listMenusRight' => $listMenusRight
      ));
    }
}
