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

class pageActions extends sfActions
{
    public function preExecute()
    {
    }
    
    public function executeIndex(sfWebRequest $request)
    {
        $route = GlobalLib::clearInput($request->getParameter('categoryRoute'));
        $this->category = GlobalTable::doFetchOne('Category', array('name'), array('route'=>$route, 'limit'=>1));
        global $CONTENT_COLUMNS;
        $this->pager = Doctrine::getTable('Content')->getPager($CONTENT_COLUMNS, array('categoryRoute'=>$route), 
            $request->getParameter('page'));
		unset($route);
    }
  
    public function executeShow(sfWebRequest $request)
    {
        $this->rs = $rs = Doctrine::getTable('Content')->doFetchOne(array('*'),
                array('route'=>GlobalLib::clearInput($request->getParameter('route')), 'limit'=>1));
        $this->forward404Unless($rs);
        
        // set nb_views
        $rs->setNbViews($rs->getNbViews()+1);
        $rs->save();
        
        // META
        $meta = sfConfig::get('app_webname');
        $this->getResponse()->setTitle($rs.' | '.$meta);
		unset($meta);
        $this->getResponse()->addMeta('description', $rs->getIntro());
        $this->getResponse()->addMeta('keywords', $rs->getKeywords().' '.$rs->getIntro());
		unset($rs);
    }
    
    public function executeByNbView(sfWebRequest $request)
    {
        global $CONTENT_COLUMNS;
        $this->pager = Doctrine::getTable('Content')->getPager($CONTENT_COLUMNS,
            array('orderBy'=>'nb_views DESC', 'limit'=>50), $request->getParameter('page'));
    }
    
    public function executeByNbComment(sfWebRequest $request)
    {
        global $CONTENT_COLUMNS;
        $this->pager = Doctrine::getTable('Content')->getPager($CONTENT_COLUMNS,
            array('orderBy'=>'nb_comment DESC', 'limit'=>50), $request->getParameter('page'));
    }
    
    public function executeArchive(sfWebRequest $request)
    {
        $this->y = GlobalLib::clearInput($request->getParameter('y') ? $request->getParameter('y') : date('Y'));
        $this->m = GlobalLib::clearInput($request->getParameter('m') ? $request->getParameter('m') : date('m'));
        global $CONTENT_COLUMNS;
        $this->pager = Doctrine::getTable('Content')->getPager($CONTENT_COLUMNS,
            array('createdAtGt'=>$this->y.'-'.$this->m.'-01', 'createdAtLt'=>$this->y.'-'.$this->m.'-31'), $request->getParameter('page'));
        
    }

    public function executeArchiveAjax(sfWebRequest $request)
    {
        $this->y = GlobalLib::clearInput($request->getParameter('y') ? $request->getParameter('y') : date('Y'));
        $this->m = GlobalLib::clearInput($request->getParameter('m') ? $request->getParameter('m') : date('m'));
        global $CONTENT_COLUMNS;
        $this->pager = Doctrine::getTable('Content')->getPager($CONTENT_COLUMNS,
            array('createdAtGt'=>$this->y.'-'.$this->m.'-01', 'createdAtLt'=>$this->y.'-'.$this->m.'-31'), $request->getParameter('page'));
        $this->setLayout(false);
        return $this->renderPartial('page/archive', array('pager'=>$this->pager, 'y'=>$this->y, 'm'=>$this->m));
    }

}
