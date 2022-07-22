<?php

namespace App\Models;
use CodeIgniter\Model;

class ContributorModel extends Model{
    protected $table='Contributors';
    protected $allowedFields=['Id','SuggestionId','ContribId','Time'];
    protected $primaryKey='Id';
    protected $db, $builder;

    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function saveContributor($data){
        $this->builder->insert($data);
    }

    public function getSelectedContributors($conditions){
        $ids=array();
        $userModel=new UserModel();
        $contributors=$this->builder->where($conditions)->get()->getResultArray();
        if($contributors){
            foreach($contributors as $contributor){
                array_push($ids, $contributor['ContribId']);
            }
            $selectedContributors=$userModel->getUserWhereIdIn($ids);
            return $selectedContributors;
        }
    }

    public function getContribSuggestions($conditions){
        $ids=array();
        $suggestionModel=new SuggestionModel();
        $contributors=$this->builder->where($conditions)->get()->getResultArray();
        if($contributors){
            foreach($contributors as $contributor){
                array_push($ids, $contributor['SuggestionId']);
            }
            $contribSuggestions=$suggestionModel->getSuggestionsWhereIdIn($ids);
            return $contribSuggestions;
        }
    }


}


?>