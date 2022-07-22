<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function moveFileAndGetName($file)
    {
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH.'public/Images/Uploads/', $fileName);
        }
        return $fileName;
    }

    public function signUp()
    {
        $userModel = new UserModel();

        $firstName = $this->request->getPost('FirstName');
        $lastName = $this->request->getPost('LastName');
        $email = $this->request->getPost('Email');
        $type = $this->request->getPost('Type');
        $password = $this->request->getPost('Password');
        $confPassword = $this->request->getPost('ConfPassword');
        $profilePicture = $this->request->getFile('ProfilePicture');
        $resume = $this->request->getFile('Resume');
        $birthDate = $this->request->getPost('BirthDate');
        $physicalLocation = $this->request->getPost('PhysicalLocation');
        $phoneNo = $this->request->getPost('PhoneNo');
        $financialDetails = $this->request->getFile('FinancialDetails');

        if ($type == "Beneficiary" || $type == "Contributor") {
            if ($password == $confPassword) {
                $password = hash('md5', $password);
                $data = [
                    'FirstName' => $firstName,
                    'LastName' => $lastName,
                    'Email' => $email,
                    'Password' => $password,
                    'Type' => $type,
                    'ProfilePicture' => $this->moveFileAndGetName($profilePicture),
                    'Resume' => $this->moveFileAndGetName($resume),
                    'BirthDate' => $birthDate,
                    'PhysicalLocation' => $physicalLocation,
                    'PhoneNo' => $phoneNo,
                    'FinancialDetails' => $this->moveFileAndGetName($financialDetails),
                ];
                $userModel->saveUser($data);
                echo '<script> alert("Successful Signup !"); </script>';
                return view('General/BenefContribSignup');
            } else {
                echo '<script> alert("Passwords do not match !"); </script>';
                return view('General/BenefContribSignup');
            }
        } else {
            echo '<script> alert("Unkown user type !"); </script>';
            return view('General/BenefContribSignup');
        }
    }

    public function signIn(){
        $userModel=new UserModel();

        $email=$this->request->getPost('Email');
        $password=$this->request->getPost('Password');
        $conditions=[
            'Email'=>$email,
            'Password'=>hash('md5', $password),
        ];
        $users=$userModel->getUserWhere($conditions);
        if(count($users)>0){
            $user=$users[0];
        }
        else{
            echo '<script> alert(" User not found !") </script>';
            return view('General/LoginPage');
        }
        if($user){
            echo '<script> alert("Successful login !") </script>';
            $type=$user['Type'];
            if($type=='Contributor'){
                session()->set('contrib', $user);
                return view('Contributor/Home');
            }
            else if($type=='Beneficiary'){
                session()->set('messageAdminId', null);
                session()->set('benef', $user);
                return view('Beneficiary/Home');
            }
        }
        else{
            echo '<script> alert("User not found !") </script>';
            return view('General/LoginPage');
        }
    }
}
