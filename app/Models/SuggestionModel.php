<?php

namespace App\Models;
use CodeIgniter\Model;

class SuggestionModel extends Model{
    protected $table='Suggestions';
    protected $allowedFields=['Id','BenefId','Title','Description','Type','StartTime','EndTime','Info','Time'];
    protected $primaryKey='Id';
    protected $db, $builder;

    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function getAllSuggestions(){
        return $this->builder->get()->getResultArray();
    }

    public function saveSuggestion($data){
        $this->builder->insert($data);
    }

    public function getSuggestionsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getSuggestionsWhereIdIn($set){
        return $this->builder->whereIn('Id',$set)->get()->getResultArray();
    }
}


?>