<?php

/**
 * category actions.
 *
 * @package    zzz
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{  
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('category'), 'admin', 'perm');  
  }

  public function executeIndex(sfWebRequest $request) {
      $params = array();
      $params['isActive'] = 'all';
      if($request->getParameter('s')) $params['sCategory'] = $request->getParameter('s');
      $this->pager = GlobalTable::getPager('Category', array('id', 'name'), $params, $request->getParameter('page'));
  }

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new CategoryForm();
      $this->setTemplate('edit');
  }

  
  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
  
      $this->form = new CategoryForm();
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($category = Doctrine::getTable('Category')->find(array($request->getParameter('id'))), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
      $this->form = new CategoryForm($category, array());
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($category = Doctrine::getTable('Category')->find(array($request->getParameter('id'))), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
      $this->form = new CategoryForm($category, array());
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($category = Doctrine::getTable('Category')->find(array($request->getParameter('id'))), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
      $c = Doctrine::getTable('CategoryContent')->doCount(array('categoryId'=>$category->getId(), 'isActive'=>'all'));
      if($c > 0) {
          $this->getUser()->setFlash('flash', "There are ".$c." contents in this category. Empty it before delete.", true);
      } else {
          $category->delete();
          $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
      }
      $this->redirect('category/index');
  }

  public function executeActivate(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Category')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
        $content->setIsActive($cmd);
        $content->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'category/index');
    }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $category = $form->save();
          $category->setRoute(GlobalLib::slugify($category->getName()));
          $category->setUpdatedAt(date('Y-m-d H:i:s'));
          $category->save();
          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('category/index');
      }
  }


}