<?php

/**
 * menu actions.
 *
 * @package    zzz
 * @subpackage menu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuActions extends sfActions
{  
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('menu'), 'admin', 'perm');  
  }

  public function executeIndex(sfWebRequest $request) {
      $params = array();
      $params['isActive'] = 'all';
      if($request->getParameter('s')) $params['sMenu'] = $request->getParameter('s');
      $this->pager = GlobalTable::getPager('Menu', array('id', 'name'), $params, $request->getParameter('page'));
  }

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new MenuForm();
      $this->setTemplate('edit');
  }

  
  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
  
      $this->form = new MenuForm();
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($menu = Doctrine::getTable('Menu')->find(array($request->getParameter('id'))), sprintf('Object menu does not exist (%s).', $request->getParameter('id')));
      $this->form = new MenuForm($menu, array());
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($menu = Doctrine::getTable('Menu')->find(array($request->getParameter('id'))), sprintf('Object menu does not exist (%s).', $request->getParameter('id')));
      $this->form = new MenuForm($menu, array());
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($menu = Doctrine::getTable('Menu')->find(array($request->getParameter('id'))), sprintf('Object menu does not exist (%s).', $request->getParameter('id')));
      $c = Doctrine::getTable('MenuContent')->doCount(array('menuId'=>$menu->getId(), 'isActive'=>'all'));
      if($c > 0) {
          $this->getUser()->setFlash('flash', "There are ".$c." contents in this menu. Empty it before delete.", true);
      } else {
          $menu->delete();
          $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
      }
      $this->redirect('menu/index');
  }

  public function executeActivate(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Menu')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
        $content->setIsActive($cmd);
        $content->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'menu/index');
    }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $menu = $form->save();
          $menu->setRoute(GlobalLib::slugify($menu->getName()));
          $menu->setUpdatedAt(date('Y-m-d H:i:s'));
          $menu->save();
          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('menu/index');
      }
  }


}