<?php
namespace PHPMVC\Models;

class EmployeeModel extends AbstractModel
{
   public $id;
   public $name;
   public $age;
   public $address;
   public $tax;
   public $salary;

//    public static $db;

    protected static $tableName = 'employees';

    protected static $tableSchema = array(
        'name'    => self::DATA_TYPE_STR,
        'age'     => self::DATA_TYPE_INT,
        'address' => self::DATA_TYPE_STR,
        'salary'  => self::DATA_TYPE_DECIMAL,
        'tax'     => self::DATA_TYPE_DECIMAL
    );

    protected static $primaryKey = 'id';

//    public function __construct($name, $age, $address, $tax, $salary)
//    {
//        $this->age = $age;
//        $this->name = $name;
//        $this->address = $address;
//        $this->salary = $salary;
//        $this->tax = $tax;
//    }

//    public function __get($props)
//    {
//        return $this->$props;
//    }

    public function setName($name) {
        $this->name = $name;
    }

    public function calculateSalary()
    {
        return $this->salary - ($this->salary * $this->tax / 100);
    }

    public function getTableName()
    {
        return self::$tableName;
    }
}