<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\EventModel;
use App\Models\MessageModel;
use App\Models\UserModel;

class AdminController extends BaseController{

    public function showPage($page){
        return view('Admin/'.$page);
    }

    public function signIn(){
        $adminModel=new AdminModel();
        $email=$this->request->getPost('Email');
        $password=$this->request->getPost('Password');
        $conditions=[
            'Email'=>$email,
            'Password'=>$password,
        ];
        $admins=$adminModel->getAdminsWhere($conditions);
        if($admins){
            session()->set('admin', $admins[0]);
            session()->set('messageBenefId', null);
            session()->set('messageContribId', null);
            echo '<script> alert("Successful Login !"); </script>';
            return view("Admin/Home");
        }
        else{
            echo '<script> alert("Unknown Administrator !"); </script>';
            return view("Admin/Login");
        }
    }

    public function editDetails(){
        $adminId=$this->request->getPost('AdminId');
        $adminModel=new AdminModel();
        $conditions=[
            'Id'=>$this->request->getPost('AdminId')
        ];
        $data=[
            'FirstName'=>$this->request->getPost('FirstName'),
            'LastName'=>$this->request->getPost('LastName'),
            'Email'=>$this->request->getPost('Email'),
            'Password'=>$this->request->getPost('Password'),
            'Gender'=>$this->request->getPost('Gender'),
            'PhysicalAddress'=>$this->request->getPost('PhysicalAddress'),
            'LastName'=>$this->request->getPost('LastName'),
        ];
        $adminModel->editAdmin($conditions, $data);
        echo '<script> alert("Admin successfully edited !"); </script>';
        session()->set('admin', $adminModel->getAdminsWhere(['Id'=>$adminId])[0]);
        return view('Admin/Home');
    }

    public function editContributor(){
        $userModel=new UserModel();

        $contribId=$this->request->getPost('ContribId');
        $email=$this->request->getPost('Email');
        $password=$this->request->getPost('Password');
        $confPassword=$this->request->getPost('ConfPassword');
        $phoneNo=$this->request->getPost('PhoneNo');

        if($password==$confPassword){
            $conditions=[
                'Id'=>$contribId,
            ];
            $data=[
                'Email'=>$email,
                'Password'=>hash('md5', $password),
                'PhoneNo'=>$phoneNo,
            ];
            $userModel->editUserWhere($conditions, $data);
            echo '<script> alert("Contributor successfully edited !"); </script>';
            return view('Admin/ViewContributors');
        }
        else{
            echo '<script> alert("Passwords do not match !"); </script>';
            return view('Admin/ViewContributors');
        }
    }

    public function editBenef(){
        $userModel=new UserModel();

        $benefId=$this->request->getPost('BenefId');
        $email=$this->request->getPost('Email');
        $password=$this->request->getPost('Password');
        $confPassword=$this->request->getPost('ConfPassword');
        $phoneNo=$this->request->getPost('PhoneNo');

        if($password==$confPassword){
            $conditions=[
                'Id'=>$benefId,
            ];
            $data=[
                'Email'=>$email,
                'Password'=>hash('md5', $password),
                'PhoneNo'=>$phoneNo,
            ];
            $userModel->editUserWhere($conditions, $data);
            echo '<script> alert("Beneficiary successfully edited !"); </script>';
            return view('Admin/ViewBeneficiaries');
        }
        else{
            echo '<script> alert("Passwords do not match !"); </script>';
            return view('Admin/ViewBeneficiaries');
        }
    }

    public function editEventStatus(){
        $eventModel=new EventModel();
        $newStatus=$this->request->getPost('NewStatus');
        $eventId=$this->request->getPost('EventId');
        $conditions=[
            'Id'=>$eventId,
        ];
        $data=[
            'Status'=>$newStatus,
        ];
        $eventModel->updateEventWhere($conditions, $data);
        echo '<script> alert("Event successfully updated !"); </script>';
        return view('Admin/ViewDonations');
    }

    public function changeMessageBenefId(){
        $messageBenefId=$this->request->getPost('MessageBenefId');
        session()->set('messageBenefId', $messageBenefId);
        return view('Admin/ChatWithBeneficiary');
    }

    public function benefSendMessage(){
        $messageModel=new MessageModel();
        $userModel=new UserModel();

        $messageBenefId=$this->request->getPost('MessageBenefId');
        $receiver=$userModel->getUserWhere(['Id'=>$messageBenefId])[0];
        $message=$this->request->getPost('Message');
        $data=[
            'SenderId'=>session()->get('admin')['Id'],
            'SenderType'=>'Admin',
            'Sender'=>session()->get('admin')['FirstName'].' '.session()->get('admin')['LastName'],
            'ReceiverId'=>$messageBenefId,
            'ReceiverType'=>'Beneficiary',
            'Receiver'=>$receiver['FirstName'].' '.$receiver['LastName'],
            'Message'=>$message,
        ];
        $messageModel->saveMessage($data);
        return view('Admin/ChatWithBeneficiary');
    }

    public function logout(){
        session()->remove('admin');
        return View('Admin/Login');
    }
}

?>