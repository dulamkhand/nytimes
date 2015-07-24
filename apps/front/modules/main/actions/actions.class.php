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
    
    public function executeSearch(sfWebRequest $request)
    {		
    		$this->s = GlobalLib::clearInput($request->getParameter('s'));
        global $CONTENT_COLUMNS;
        $this->pager = Doctrine::getTable('Content')->getPager($CONTENT_COLUMNS,
            array('s'=>$this->s), $request->getParameter('page'));	
    }

    public function executeAbout(sfWebRequest $request)
    {	
        $this->page = GlobalTable::doFetchOne('Page', array('*'), array('type'=>'about', 'limit'=>1));
    }
    
    public function executeAdvertisement(sfWebRequest $request)
    {	
        $this->page = GlobalTable::doFetchOne('Page', array('*'), array('type'=>'advertisement', 'limit'=>1));
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
    					  						sfConfig::get('app_feedbackmail'), 
    					  						//'handaa.1224@gmail.com', 
    					  						'baavar.mn | feedback', 
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
			  $this->setLayout('wideLayout');
    }
    
    public function execute404(sfWebRequest $request)
    {
        
    }
    
    public function executeAutoPost(sfWebRequest $request)
    {
				date_default_timezone_set('Asia/Ulaanbaatar');
		        $rss = Doctrine::getTable('Content')->doExecute(array('id, is_active, post_at, created_at'), array('isActive'=>'0', 'limit'=>100, 'postAtGt'=>date('Y-m-d H').':00:00', 'postAtLt'=>date('Y-m-d H').':59:59'));
				foreach($rss as $rs) {
					$rs->setIsActive(1);
					$rs->setCreatedAt($rs->getPostAt());
					$rs->save();
				}
				$this->setTemplate(false);
				$this->setLayout(false);
				$nbposts = sizeof($rss);
				unset($rss);
				return $this->renderText($nbposts." posts successfully auto posted.");
    }

}
