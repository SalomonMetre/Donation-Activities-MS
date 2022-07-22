<?php

namespace App\Models;
use CodeIgniter\Model;

class OpportunityModel extends Model{
    protected $table='Opportunities';
    protected $allowedFields=['Id','BenefId','ContribId','Type','Description','Requirements','Status','Time'];
    protected $primaryKey='Id';
    protected $db, $builder;

    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function saveOpportunity($data){
        $this->builder->insert($data);
    }

    public function getAllOpportunities(){
        return $this->builder->get()->getResultArray();
    }

    public function getOpportunitiesWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

}
?>