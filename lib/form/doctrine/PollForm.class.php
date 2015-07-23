<?php

/**
 * Poll form.
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollForm extends BasePollForm
{
  public function configure()
  {
	  unset($this['item_id'], $this['options_addable'], $this['multiple_choice']);

      // WIDGETS
      $this->widgetSchema['title']   = new sfWidgetFormInputText(array(), array('style'=>'width:500px;'));
      $this->widgetSchema['body']    = new sfWidgetFormTextarea(array(), array('style'=>'width:494px;height:120px;'));
      
      // VALIDATORS
      $this->validatorSchema['title'] = new sfValidatorString(array(), array());
      $this->validatorSchema['body']  = new sfValidatorPass();
  }

}
