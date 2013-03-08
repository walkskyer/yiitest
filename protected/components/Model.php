<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-3-7
 * Time: 上午10:07
 * File: Model.php
 * To change this template use File | Settings | File Templates.
 */
class Model extends CActiveRecord
{
    public $tablename;
    public $dbPrefix='';
    public function __construct($scenario='insert')
    {
        parent::__construct($scenario);
    }
    public function tableName(){
        return $this->dbPrefix.$this->tablename;
    }
}
