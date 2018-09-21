<?php 
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use User\Form\UserForm;
use User\Model\UserModel;
use User\Traits\AdapterTrait;

class UserController extends AbstractActionController
{
    use AdapterTrait;
    
    public function indexAction()
    {
        return ([
            
        ]);
    }
    
    public function createAction()
    {
        $form = new UserForm();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $user = new UserModel($this->adapter);
            
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $user->exchangeArray($form->getData());
                $user->create();
                
                return $this->redirect()->toRoute('user');
            }
        }
        
        return [
            'form' => $form,
        ];
    }
}