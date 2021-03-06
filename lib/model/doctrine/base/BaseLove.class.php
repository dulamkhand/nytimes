<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Love', 'doctrine');

/**
 * BaseLove
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $object_type
 * @property integer $object_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $user_id
 * @property string $ip_address
 * 
 * @method integer   getId()          Returns the current record's "id" value
 * @method string    getObjectType()  Returns the current record's "object_type" value
 * @method integer   getObjectId()    Returns the current record's "object_id" value
 * @method timestamp getCreatedAt()   Returns the current record's "created_at" value
 * @method timestamp getUpdatedAt()   Returns the current record's "updated_at" value
 * @method integer   getUserId()      Returns the current record's "user_id" value
 * @method string    getIpAddress()   Returns the current record's "ip_address" value
 * @method Love      setId()          Sets the current record's "id" value
 * @method Love      setObjectType()  Sets the current record's "object_type" value
 * @method Love      setObjectId()    Sets the current record's "object_id" value
 * @method Love      setCreatedAt()   Sets the current record's "created_at" value
 * @method Love      setUpdatedAt()   Sets the current record's "updated_at" value
 * @method Love      setUserId()      Sets the current record's "user_id" value
 * @method Love      setIpAddress()   Sets the current record's "ip_address" value
 * 
 * @package    imdb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLove extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('love');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('object_type', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('object_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('ip_address', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}