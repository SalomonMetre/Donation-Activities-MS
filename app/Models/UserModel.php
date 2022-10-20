<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table='Users';
    protected $allowedFields=['Id','FirstName','LastName','Email','TypePassword','ProfilePicture','Resume','BirthDate','PhysicalLocation','PhoneNo','FinancialDetails'];
    protected $primaryKey='Id';
    protected $db, $builder;

    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function saveUser($data){
        $this->builder->insert($data);
    }

    public function getUserWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getUserWhereIdIn($set){
        return $this->builder->whereIn('Id',$set)->get()->getResultArray();
    }

    public function editUserWhere($conditions, $data){
        $this->builder->where($conditions)->update($data);
    }
}


?>