<?php

namespace App\Controllers;

use App\Models\FeedbackMessageModel;

class LandingController extends BaseController
{

    public function insertFeedbackMessage()
    {
        $feedbackMessageModel = new FeedbackMessageModel;
        $email = $this->request->getPost('Email');
        $message = $this->request->getPost('Message');
        $data = [
            'Email' => $email,
            'Message' => $message,
        ];
        $feedbackMessageModel->insert($data);
        echo '<script> alert("Message successfully sent !"); </script>';
        return view('General/HomePage');
    }

    public function showPage($page){
        return View('General/'.$page);
    }

}
