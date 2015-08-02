<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */

$CONTENT_COLUMNS = array('title', 'route', 'cover', 'intro', 'created_at', 'nb_views', 'nb_comment', 'nb_love');

class mainActions extends sfActions
{

    public function preExecute()
    {
    }
  
    public function executeHome(sfWebRequest $request)
    {
        global $CONTENT_COLUMNS;
        $this->pager = Doctrine::getTable('Content')->getPager($CONTENT_COLUMNS,
                  array(), $request->getParameter('page'));
        $this->setLayout('homeLayout');
    }
    
    # BEGIN OF PAGE
    public function executeAbout(sfWebRequest $request)
    {	
        $this->page = GlobalTable::doFetchOne('Page', array('*'), array('type'=>'about', 'limit'=>1));
    }
    
    public function executeAdvertisement(sfWebRequest $request)
    {	
        $this->page = GlobalTable::doFetchOne('Page', array('*'), array('type'=>'advertisement', 'limit'=>1));
    }
		
    public function executePrivacy(sfWebRequest $request)
    {	
        $this->page = GlobalTable::doFetchOne('Page', array('*'), array('type'=>'privacy', 'limit'=>1));
    }
    
    public function executeTerms(sfWebRequest $request)
    {	
        $this->page = GlobalTable::doFetchOne('Page', array('*'), array('type'=>'terms', 'limit'=>1));
    }
    
    public function executeCooperate(sfWebRequest $request)
    {	
        $this->page = GlobalTable::doFetchOne('Page', array('*'), array('type'=>'cooperate', 'limit'=>1));
    }
        
    public function executeContact(sfWebRequest $request)
    {
    		$form = new FeedbackForm();
    		if($request->isMethod(sfRequest::POST)) {
    				$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
			      if ($form->isValid()) {
                $feedback = new Feedback();
			          $feedback->setOrganization(GlobalLib::clearOutput($form->getValue('organization')));
			          $feedback->setName(GlobalLib::clearOutput($form->getValue('name')));
			          $feedback->setEmail(GlobalLib::clearOutput($form->getValue('email')));
			          $feedback->setPhone(GlobalLib::clearOutput($form->getValue('phone')));
			          $feedback->setMessage(GlobalLib::clearOutput($form->getValue('message')));
			          $feedback->save();
    					  $body = $this->getPartial("partial/mailFeedback", array('rs'=>$feedback));
    					  $message = $this->getMailer()->compose(
    					  						$feedback->getEmail(), 
    					  						sfConfig::get('app_feedback_mail'), 
    					  						sfConfig::get('app_domain').' ~ feedback', 
    					  						$body);
    					  try {
		    					  $this->getMailer()->send($message);
    					  } catch (Exception $e) {}
			          $this->getUser()->setFlash('flash', 'Таны захидлыг амжилттай илгээлээ.', true);
			          $this->redirect('main/contact');
			      }
    		} else {
            $this->getResponse()->setTitle(sfConfig::get('app_webname').' | Холбоо барих');
    		}
			  $this->form = $form;
    }
    # EO PAGE
    
    public function execute404(sfWebRequest $request)
    {
    }
}
