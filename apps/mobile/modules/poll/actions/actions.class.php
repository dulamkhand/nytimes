<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class pollActions extends sfActions
{

	  public function executeVote(sfWebRequest $request)
    {
        if($request->isMethod(sfRequest::POST)) {
						if($option = Doctrine::getTable('PollOption')->find(GlobalLib::clearInput(intval($request->getParameter('pollOptionId'))))) {
						    if(in_array($act = GlobalLib::clearInput($request->getParameter('act')), array('inc', 'dec'))) {
						        $nbvote = $option->getNbVote();
						        if($act == 'dec' && $nbvote > 0) {
    						        $option->setNbVote($nbvote-1);
    						        $option->save();
						        } else if($act == 'inc') {
    						        $option->setNbVote($nbvote+1);
    						        $option->save();
						        }
    						    echo $option->getNbVote();
  						  }
						}
        }
        $this->setLayout(false);
        $this->setTemplate(false);
        exit;
    }

    
    public function executeAddOption(sfWebRequest $request)
    {
        if($request->isMethod(sfRequest::POST)) {
            $pollId = GlobalLib::clearInput(intval($request->getParameter('pollId')));
            if($this->poll = Doctrine::getTable('Poll')->doFetchOne(array('id'=>$pollId))) {
    				    if($newOption = myTools::clearInput($request->getParameter('newOption'))) {
    				        $o = new PollOption();
        						$o->setPollId($pollId);
        						$o->setBody($newOption);
        						$o->setIp($request->getRemoteAddress());
        						$o->setIsActive(1);
        						$o->save();
        						$this->o = $o;
                }
            }
        }
        $this->setLayout(false);
        return sfView::SUCCESS;
    }

}