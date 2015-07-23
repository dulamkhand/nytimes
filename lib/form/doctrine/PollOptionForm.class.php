<?php

/**
 * PollOption form.
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollOptionForm extends BasePollOptionForm
{
  public function configure()
  {
	  	unset($this['user_id'],$this['ip'],$this['nb_vote']);

      // WIDGETS    	  
      $this->widgetSchema['poll_id']  = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'), 'add_empty' => false), array('style'=>'width:500px;'));
	  $this->widgetSchema['image']    = new sfWidgetFormInputFile(array(), array('style'=>'width:500px;'));
      $this->widgetSchema['body']     = new sfWidgetFormTextarea(array(), array('style'=>'width:494px;height:120px;'));
      
      // DEFAULT VALUE
      $this->setDefault('poll_id', $this->getOption('pollId'));

      // VALIDATORS
      $this->validatorSchema['poll_id'] = new sfValidatorPass();
      $this->validatorSchema['body']    = new sfValidatorString(array(), array());
	  $this->validatorSchema['image']   = new sfValidatorFile(
                                                  array('required' => $this->getObject()->isNew(),
                                                      'path'       => sfConfig::get("sf_upload_dir")."/poll",
                                                      'max_size'   => 209715200,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',)),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 20MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));
  }
}
