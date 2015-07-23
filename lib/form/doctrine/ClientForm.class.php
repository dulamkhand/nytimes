<?php

/**
 * Client form.
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClientForm extends BaseClientForm
{
  public function configure()
  {
      $host = sfConfig::get('app_host');
      
      // WIDGETS
      $this->widgetSchema['logo']        = new sfWidgetFormInputFile(array(), array());

      // VALIDATORS
      $this->validatorSchema['logo']    = new sfValidatorFile(
                                                  array('required' => false,
                                                      'path'       => sfConfig::get("sf_upload_dir")."/client",
                                                      'max_size'   => 10485760,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif')),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 1MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));
      # HELP
      $this->widgetSchema->setHelp('logo', 'dimension: 248 x 60, png|gif|jpg, maxsize:1MB');
      $this->widgetSchema->setHelp('sort', 'Буурахаар эрэмбэлнэ');
  }
}
