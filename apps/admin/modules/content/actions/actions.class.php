<?php
/**
 * page actions.
 *
 * @package    barilga
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends sfActions
{
    public function preExecute() {
        $this->forwardUnless($this->getUser()->hasCredential('content'), 'admin', 'perm');
    }
    
    public function executeIndex(sfWebRequest $request)
    {
    		$this->s = $request->getParameter('s');
        $this->pager = Doctrine::getTable('Content')->getPager(array('id', 'title', 'route', 'intro'), 
            array('s'=>$this->s, 'isActive'=>'all'), $request->getParameter('page'));
    }
    
    public function executeTop(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
        $content->setIsTop($cmd);
        $content->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }
    
    public function executeActivate(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
        $content->setIsActive($cmd);
        $content->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }
    
    public function executeFeaturate(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
        $content->setIsFeatured($cmd);
        $content->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new ContentForm();
    }
  
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
    
        $this->form = new ContentForm();
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new ContentForm($content);
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($content = Doctrine::getTable('Content')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new ContentForm($content);
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));

		// delete from Image
		Doctrine_Query::create()->delete()->from('Image')
			->where('content_id = ?', $content->getId())
			->execute();
		// delete from CategoryContent
		Doctrine_Query::create()->delete()->from('CategoryContent')
			->where('content_id = ?', $content->getId())
			->execute();
        $content->delete();
        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        
        $categoryIds = $request->getParameter('category_ids');
        if(!sizeof($categoryIds)) {
            $this->getUser()->setFlash('flash', 'Ангилал сонгоно уу.', true);
        } else {
            if ($form->isValid()) {
                $content = $form->save();
                $content->setTitle(trim($content->getTitle()));
                $content->setRoute(GlobalLib::slugify($content->getTitle()));
				$tmp = $form->getValue('post_at');
                $content->setPostAt($tmp['date'].' '.$tmp['hour'].':'.$tmp['minute'].':01');
                $content->save();
    
                // save category_ids
                Doctrine_Query::create()->delete()->from('CategoryContent')
                    ->where('content_id = ?', $content->getId())
                    ->execute();
                foreach($categoryIds as $categoryId) {
                    $a = new CategoryContent();
                    $a->setCategoryId($categoryId);
                    $a->setContentId($content->getId());
                    $a->setCreatedAid($this->getUser()->getId());
                    $a->setUpdatedAid($this->getUser()->getId());
                    $a->save();
                }
                
                /* IMAGE */
                // image size 600x450
                // branch1 - 85x120, 125x156
                // branch2 - 
                // branch3 - 180x250, 713x400
                // leaf1 - 450x~, 70x50
                $this->getUser()->setFlash('flash', 'Successfully saved.', true);
                $this->redirect('image/new?contentId='.$content->getId());
            }    
        }
    }
	
	/*public function executeTest(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find($request->getParameter('id')));
        //$content->setPostAt('2015-01-13 13:40:00');
		$content->setCreatedAt(date('Y-m-d H:i:s'));
        $content->save();
        $this->redirect('content/index');
    }*/
}