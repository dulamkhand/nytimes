<?php

/**
 * Content form base class.
 *
 * @method Content getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'title'       => new sfWidgetFormTextarea(),
      'route'       => new sfWidgetFormTextarea(),
      'cover'       => new sfWidgetFormTextarea(),
      'intro'       => new sfWidgetFormTextarea(),
      'body'        => new sfWidgetFormTextarea(),
      'source'      => new sfWidgetFormTextarea(),
      'source_link' => new sfWidgetFormTextarea(),
      'sort'        => new sfWidgetFormInputText(),
      'nb_views'    => new sfWidgetFormInputText(),
      'nb_love'     => new sfWidgetFormInputText(),
      'nb_comment'  => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'is_new'      => new sfWidgetFormInputCheckbox(),
      'is_top'      => new sfWidgetFormInputCheckbox(),
      'is_featured' => new sfWidgetFormInputCheckbox(),
      'ask18'       => new sfWidgetFormInputCheckbox(),
      'post_at'     => new sfWidgetFormDateTime(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'created_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'), 'add_empty' => false)),
      'updated_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'), 'add_empty' => false)),
      'keywords'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'route'       => new sfValidatorString(array('max_length' => 1000)),
      'cover'       => new sfValidatorString(array('max_length' => 1000)),
      'intro'       => new sfValidatorString(array('required' => false)),
      'body'        => new sfValidatorString(array('required' => false)),
      'source'      => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'source_link' => new sfValidatorString(array('max_length' => 1000)),
      'sort'        => new sfValidatorInteger(array('required' => false)),
      'nb_views'    => new sfValidatorInteger(array('required' => false)),
      'nb_love'     => new sfValidatorInteger(array('required' => false)),
      'nb_comment'  => new sfValidatorInteger(array('required' => false)),
      'is_active'   => new sfValidatorBoolean(),
      'is_new'      => new sfValidatorBoolean(),
      'is_top'      => new sfValidatorBoolean(),
      'is_featured' => new sfValidatorBoolean(),
      'ask18'       => new sfValidatorBoolean(),
      'post_at'     => new sfValidatorDateTime(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'created_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'))),
      'updated_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'))),
      'keywords'    => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Content';
  }

}
