<?php

/**
 * Content form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContentForm extends BaseContentForm
{
  public function configure()
  {
      unset($this['cover'],$this['nb_comment'],$this['is_new'],$this['related_ids'],$this['ask18']);
            
      $obj = $this->getObject();
      $host = sfConfig::get('app_host');

      # WIDGETS
      $this->widgetSchema['title']          = new sfWidgetFormInputText(array(), array('style'=>'width:500px;'));
      $this->widgetSchema['intro']          = new sfWidgetFormTextarea(array(), array('style'=>'width:500px;height:120px;'));
    	$this->widgetSchema['body']           = new sfWidgetFormTextarea(array(), array('style'=>'width:500px;height:200px;'));
    	$this->widgetSchema['keywords']       = new sfWidgetFormInputText(array(), array('style'=>'width:506px;'));
    	$this->widgetSchema['source']         = new sfWidgetFormInputText(array(), array());
    	$this->widgetSchema['source_link']    = new sfWidgetFormInputText(array(), array());
    	$this->widgetSchema['is_top']         = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
  	  $this->widgetSchema['post_at']        = new sfWidgetFormDatePickerTime(array(), array('style'=>'width:60px;'));

    	# VALIDATORS
    	$this->validatorSchema['title']         = new sfValidatorString(array(), array());    	
    	$this->validatorSchema['intro']  	      = new sfValidatorPass();
    	$this->validatorSchema['body']          = new sfValidatorPass();
    	$this->validatorSchema['keywords']      = new sfValidatorPass();
    	$this->validatorSchema['source']  	    = new sfValidatorPass();
    	$this->validatorSchema['source_link']  	= new sfValidatorUrl(array('required'=>false), array());
    	$this->validatorSchema['is_top']  	    = new sfValidatorPass();
    	$this->validatorSchema['post_at']  	    = new sfValidatorPass();
    	

      # LABEL
      $this->widgetSchema->setLabel('keywords', 'Google search keywords');
      
      # HELP
      $this->widgetSchema->setHelp('source', 'Жишээ: Балбарын блог');
      $this->widgetSchema->setHelp('source_link', 'http://www.balbar-blog.mn');
      $this->widgetSchema->setHelp('is_top', 'Шилдэг нийтлэл эсэх');
      $this->widgetSchema->setHelp('ask18', '+18 асуух эсэх');
  }
  
}