<?php

/**
 * page actions.
 *
 * @package    barilga
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class commentActions extends sfActions
{
    function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('comment'), 'admin', 'perm');  
    }

    public function executeIndex(sfWebRequest $request)
    {
        $this->pager = Doctrine::getTable('Comment')->getPager(array('*'), array(
                'objectType'  => 'content',
                'objectId'    => $request->getParameter('objectId'),
                'sComment'     => $request->getParameter('s'),
                'isActive'    => 'all',
                'orderBy'     => 'created_at DESC',
            ), $request->getParameter('page'));
    }
    
    public function executeShow(sfWebRequest $request)
    {
        $this->forward404Unless($this->content = Doctrine::getTable('Content')->doFetchOne(array('id', 'title', 'route'), 
                                                          array('id'=>$this->getRequestParameter('objectId'))));
        $this->pager = Doctrine::getTable('Comment')->getPager(array('*'), array(
                'objectType'=> 'content',
                'objectId'  => $this->content->getId(),
                'keyword'   => $request->getParameter('keyword'),
                'isActive'  => 'all',
                'orderBy'   => 'created_at DESC'), 
            $request->getParameter('page'));
    }

    public function executeActivate(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Comment')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
        $content->setIsActive($cmd);
        $content->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'comment/index');
    }

}