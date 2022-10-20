<?php

namespace App\Models;
use CodeIgniter\Model;

class FeedbackMessageModel extends Model{
    protected $table='FeedbackMessages';
    protected $allowedFields=['Id', 'Email','Message', 'Time'];
    protected $primaryKey='FeedbackMessageId';
    protected $db, $builder;

    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function getAllFeedbackMessages(){
        return $this->builder->orderBy('Time')->get()->getResultArray();
    }

    public function insertFeedbackMessage($data){
        $this->builder->insert($data);
    }

}


?>