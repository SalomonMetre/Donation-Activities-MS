<?php

namespace App\Models;
use CodeIgniter\Model;

class EventModel extends Model{
    protected $table='Events';
    protected $allowedFields=['Id','BenefId	ContribId','Topic','EventDescription','EventInfo','StartTime','EndTime','Status','Time'];
    protected $primaryKey='Id';
    protected $db, $builder;

    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function saveEvent($data){
        $this->builder->insert($data);
    }

    public function getAllEvents(){
        return $this->builder->get()->getResultArray();
    }

    public function getEventsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }
    
    public function updateEventWhere($conditions, $data){
        $this->builder->where($conditions)->update($data);
    }
   
}
