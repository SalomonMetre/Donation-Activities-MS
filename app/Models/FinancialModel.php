<?php

namespace App\Models;
use CodeIgniter\Model;

class FinancialModel extends Model{
    protected $table='Financials';
    protected $allowedFields=['Id','BenefId','ContribId','Amount','Currency','FinancialInfo','FinancialDescription','Status','Time'];
    protected $primaryKey='Id';
    protected $db, $builder;

    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function saveFinancial($data){
        $this->builder->insert($data);
    }
   
    public function getAllFinancials(){
        return $this->builder->get()->getResultArray();
    }

    public function getFinancialsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }
}
?>