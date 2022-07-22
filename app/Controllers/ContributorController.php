<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\EventModel;
use App\Models\FinancialModel;
use App\Models\OpportunityModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class ContributorController extends BaseController
{
    public function moveFileAndGetName($file)
    {
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/Images/Uploads/', $fileName);
        }
        return $fileName;
    }

    public function showPage($page)
    {
        return view('Contributor/' . $page);
    }

    public function editDetails()
    {
        $userModel = new UserModel();

        $contribId=$this->request->getPost('ContribId');
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
                'Id'=>$contribId,
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
            echo '<script> alert(" Contributor details successfully updated !"); </script>';
            session()->set('contrib', $userModel->getUserWhere(['Id'=>$contribId])[0]);
            return view('Contributor/Home');
        } else {
            echo '<script> alert("Passwords do not match !"); </script>';
            return view('Contributor/Home');
        }
    }

    public function donate(){
        $financialModel=new FinancialModel();
        $eventModel=new EventModel();
        $opportunityModel=new OpportunityModel();

        $type=$this->request->getPost('Type');
        $benefId=$this->request->getPost('BenefId');
        $contribId=$this->request->getPost('ContribId');

        $amount=$this->request->getPost('Amount');
        $currency=$this->request->getPost('Currency');
        $financialInfo=$this->request->getFile('FinancialInfo');
        $financialDescription=$this->request->getPost('FinancialDescription');

        $topic=$this->request->getPost('Topic');
        $eventDescription=$this->request->getPost('EventDescription');
        $eventInfo=$this->request->getFile('EventInfo');
        $startTime=$this->request->getPost('StartTime');
        $endTime=$this->request->getPost('EndTime');

        $opportunityType=$this->request->getPost('OpportunityType');
        $opportunityDescription=$this->request->getPost('OpportunityDescription');
        $requirements=$this->request->getFile('Requirements');
        
        if($type=='Financial'){
            $data=[
                'Benefid'=>$benefId,
                'ContribId'=>$contribId,
                'Amount'=>$amount,
                'Currency'=>$currency,
                'FinancialInfo'=>$this->moveFileAndGetName($financialInfo),
                'FinancialDescription'=>$financialDescription,
                'Status'=>'OK',
            ];
            $financialModel->saveFinancial($data);
            echo '<script> alert("Financial donation successfully recorded !"); </script>';
            return view('Contributor/ViewSuggestions');
        }else if($type=='Event'){
            $data=[
                'Benefid'=>$benefId,
                'ContribId'=>$contribId,
                'Topic'=>$topic,
                'EventDescription'=>$eventDescription,
                'EventInfo'=>$this->moveFileAndGetName($eventInfo),
                'StartTime'=>$startTime,
                'EndTime'=>$endTime,
                'Status'=>'Pending',
            ];
            $eventModel->saveEvent($data);
            echo '<script> alert("Event successfully recorded !"); </script>';
            return view('Contributor/ViewSuggestions');
        }else{
            $data=[
                'Benefid'=>$benefId,
                'ContribId'=>$contribId,
                'Type'=>$opportunityType,
                'Description'=>$opportunityDescription,
                'Requirements'=>$this->moveFileAndGetName($requirements),
                'Status'=>'OK',
            ];
            $opportunityModel->saveOpportunity($data);
            echo '<script> alert("Opportunity successfully shared !"); </script>';
            return view('Contributor/ViewSuggestions');
        }

    }

    public function logout()
    {
        session()->remove('contrib');
        echo '<script> alert("Successful logout !"); </script> ';
        return view('General/HomePage');
    }
}
