<?php

/**
 * Comment form base class.
 *
 * @method Comment getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'object_type' => new sfWidgetFormInputText(),
      'object_id'   => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'user_id'     => new sfWidgetFormInputText(),
      'avator'      => new sfWidgetFormInputText(),
      'ip_address'  => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'text'        => new sfWidgetFormTextarea(),
      'nb_love'     => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'nb_like'     => new sfWidgetFormInputText(),
      'nb_unlike'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'object_type' => new sfValidatorString(array('max_length' => 255)),
      'object_id'   => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'user_id'     => new sfValidatorInteger(),
      'avator'      => new sfValidatorString(array('max_length' => 255)),
      'ip_address'  => new sfValidatorString(array('max_length' => 15)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'text'        => new sfValidatorString(),
      'nb_love'     => new sfValidatorInteger(array('required' => false)),
      'is_active'   => new sfValidatorBoolean(),
      'nb_like'     => new sfValidatorInteger(array('required' => false)),
      'nb_unlike'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }

}
