<?php

/**
 * client actions.
 *
 * @package    broadway
 * @subpackage client
 * @author     singleton
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientActions extends sfActions
{
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('client'), 'admin', 'perm');  
  }
  
  public function executeIndex(sfWebRequest $request)
  {
      $params = array();
      $params['isActive'] = 'all';
      if($request->getParameter('s')) $params['sClient'] = $request->getParameter('s');
      $this->pager = GlobalTable::getPager('Client', array('*'), $params, $request->getParameter('page'));
  }
  
  
  public function executeActivate(sfWebRequest $request)
  {
    $this->forward404Unless($client = Doctrine::getTable('Client')->find($request->getParameter('id')));
    $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));

    $client->setIsActive($cmd);
    $client->save();
    $this->getUser()->setFlash('flash', 'Successfully saved.', true);

    $this->redirect('client/index');
  }
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClientForm();
    $this->setTemplate('edit');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ClientForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($client = Doctrine::getTable('Client')->find(array($request->getParameter('id'))), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientForm($client);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($client = Doctrine::getTable('Client')->find(array($request->getParameter('id'))), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientForm($client);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($client = Doctrine::getTable('Client')->find(array($request->getParameter('id'))), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
      
    try {
      $client->delete();
      
      $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
    }catch (Exception $e){}
    
    $this->redirect('client/index');
    
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $client = $form->save();
          $client->setUpdatedAt(date('Y-m-d H:i:s'));
          $client->save();
          
          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('client/index');
      }
  }

  
}