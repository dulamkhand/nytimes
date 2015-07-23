<?php

/**
 * Page form.
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PageForm extends BasePageForm
{
    public function configure()
    {
        // WIDGETS
        $this->widgetSchema['title']        = new sfWidgetFormInputText(array(), array());
        $this->widgetSchema['type']         = new sfWidgetFormInputHidden(array(), array());
        $this->widgetSchema['image']        = new sfWidgetFormInputFile(array(), array());
        $this->widgetSchema['intro']        = new sfWidgetFormTextarea(array(), array('style'=>'width:600px;height:100px;'));
        $this->widgetSchema['content']      = new sfWidgetFormTextarea(array(), array('style'=>'width:600px;height:300px;'));
        
  
        // VALIDATORS
        $this->validatorSchema['title']     = new sfValidatorString();
        $this->validatorSchema['type']      = new sfValidatorString();
        $this->validatorSchema['image']     = new sfValidatorFile(
                                                    array('required' => false,
                                                        'path'       => sfConfig::get("sf_upload_dir")."/page",
                                                        'max_size'   => 209715200,
                                                        'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif','application/x-shockwave-flash')),
                                                    array(
                                                        'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 20MB байна',
                                                        'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));
        $this->validatorSchema['intro']     = new sfValidatorPass();
        $this->validatorSchema['content']  	= new sfValidatorPass();
        
        // HELP
        $this->widgetSchema->setHelp('image', 'dimension: 720 x ~, png|gif|jpg, maxsize:20MB');
    }
}
