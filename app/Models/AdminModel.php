<?php

namespace App\Models;
use CodeIgniter\Model;

class AdminModel extends Model{
    protected $table='Admins';
    protected $allowedFields=['Id', 'Email', 'Password', 'LastName','FirstName','Gender','BirthDate','PhysicalAddress','Time'];
    protected $primaryKey='Id';
    protected $db, $builder;

    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function getAdminsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getAllAdmins(){
        return $this->builder->get()->getResultArray();
    }

    public function editAdmin($conditions, $data){
        $this->builder->where($conditions)->update($data);
    }

}


?>