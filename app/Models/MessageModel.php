<?php

namespace App\Models;
use CodeIgniter\Model;

class MessageModel extends Model{
    protected $table='Messages';
    protected $allowedFields=['Id','SenderId','SenderType','Sender','ReceiverId','ReceiverType','Receiver','Message','Time'];
    protected $primaryKey='Id';
    protected $db, $builder;

    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function saveMessage($data){
        $this->builder->insert($data);
    }

    public function getMessagesWhere($conditions, $conditions2){
        return $this->builder->where($conditions)->orWhere($conditions2)->get()->getResultArray();
    }

    public function getAllMessages(){
        return $this->builder->get()->getResultArray();
    }
}
?>