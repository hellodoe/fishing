<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
	  $objectManager = $this
        ->getServiceLocator()
        ->get('Doctrine\ORM\EntityManager');

       $repo = $objectManager->getRepository('\Application\Entity\User');
       $users = $repo->findAll();

       var_dump($users);

	  // $user = new \Application\Entity\User();
	  // $user->setFullName('John Doe');

	  // $objectManager->persist($user);
	  // $objectManager->flush();
	  
	  // var_dump($user);

	  // var_dump($user->getFullName());
       return new ViewModel(
				array('users' => $users)
			   );
    }
}
