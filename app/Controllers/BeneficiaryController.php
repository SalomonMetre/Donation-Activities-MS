<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ContributorModel;
use App\Models\MessageModel;
use App\Models\SuggestionModel;
use App\Models\UserModel;

class BeneficiaryController extends BaseController
{
    public function moveFileAndGetName($file)
    {
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/Images/Uploads/', $fileName);
        }
        return $fileName;
    }

    public function showPage($page){
        return view('Beneficiary/'.$page);
    }

    public function editDetails(){
        $userModel = new UserModel();

        $benefId=$this->request->getPost('benefId');
        $firstName = $this->request->getPost('FirstName');
        $lastName = $this->request->getPost('LastName');
        $email = $this->request->getPost('Email');
        $password = $this->request->getPost('Password');
        $confPassword = $this->request->getPost('ConfPassword');
        $profilePicture = $this->request->getFile('ProfilePicture');
        $resume = $this->request->getFile('Resume');
        $birthDate = $this->request->getPost('BirthDate');
        $physicalLocation = $this->request->getPost('PhysicalLocation');
        $phoneNo = $this->request->getPost('PhoneNo');
        $financialDetails = $this->request->getFile('FinancialDetails');

        if ($password == $confPassword) {
            $password = hash('md5', $password);
            $conditions=[
                'Id'=>$benefId,
            ];
            $data = [
                'FirstName' => $firstName,
                'LastName' => $lastName,
                'Email' => $email,
                'Password' => $password,
                'ProfilePicture' => $this->moveFileAndGetName($profilePicture),
                'Resume' => $this->moveFileAndGetName($resume),
                'BirthDate' => $birthDate,
                'PhysicalLocation' => $physicalLocation,
                'PhoneNo' => $phoneNo,
                'FinancialDetails' => $this->moveFileAndGetName($financialDetails),
            ];
            $userModel->editUserWhere($conditions, $data);
            echo '<script> alert(" Beneficiary details successfully updated !"); </script>';
            session()->set('benef', $userModel->getUserWhere(['Id'=>$benefId])[0]);
            return view('Beneficiary/Home');
        } else {
            echo '<script> alert("Passwords do not match !"); </script>';
            return view('Beneficiary/Home');
        }
    }

    public function addSuggestion(){
        $suggestionModel=new SuggestionModel();

        $title=$this->request->getPost('Title');
        $type=$this->request->getPost('Type');
        $startTime=$this->request->getPost('StartTime');
        $endTime=$this->request->getPost('EndTime');
        $description=$this->request->getPost('Description');
        $info=$this->request->getFile('Info');

        $data=[
            'BenefId'=>session()->get('benef')['Id'],
            'Title'=>$title,
            'Type'=>$type,
            'StartTime'=>$startTime,
            'EndTime'=>$endTime,
            'Description'=>$description,
            'Info'=>$this->moveFileAndGetName($info),
        ];

        $suggestionModel->saveSuggestion($data);
        echo '<script> alert("New Suggestion successfully added !"); </script> ';
        return view('Beneficiary/AddSuggestion');
    }

    public function addContributor(){
        $contributorModel=new ContributorModel();
        $data=[
            'ContribId'=>$this->request->getPost('ContributorId'),
            'SuggestionId'=>$this->request->getPost('SuggestionId'),
        ];
        $contributorModel->saveContributor($data);
        echo '<script> alert("Suggestion sent to new contributor !"); </script> ';
        return view('Beneficiary/ViewSuggestions');
    }

    public function changeMessageAdminId(){
        $messageAdminId=$this->request->getPost('MessageAdminId');
        session()->set('messageAdminId', $messageAdminId);
        return view('Beneficiary/ChatWithAdmin');
    }

    public function adminSendMessage(){
        $messageModel=new MessageModel();
        $adminModel=new AdminModel();

        $messageAdminId=$this->request->getPost('MessageAdminId');
        $receiver=$adminModel->getAdminsWhere(['Id'=>$messageAdminId])[0];
        $message=$this->request->getPost('Message');
        $data=[
            'SenderId'=>session()->get('benef')['Id'],
            'SenderType'=>'Beneficiary',
            'Sender'=>session()->get('benef')['FirstName'].' '.session()->get('benef')['LastName'],
            'ReceiverId'=>$messageAdminId,
            'ReceiverType'=>'Admin',
            'Receiver'=>$receiver['FirstName'].' '.$receiver['LastName'],
            'Message'=>$message,
        ];
        $messageModel->saveMessage($data);
        return view('Beneficiary/ChatWithAdmin');
    }

    public function logout(){
        session()->remove('benef');
        echo '<script> alert("Successful logout !"); </script> ';
        return view('General/HomePage');
    }
}
