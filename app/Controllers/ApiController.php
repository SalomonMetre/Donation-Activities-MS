<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\EventModel;
use App\Models\FinancialModel;
use App\Models\OpportunityModel;
use App\Models\SuggestionModel;
use App\Models\UserModel;

class ApiController extends BaseController
{
    public function showApiDoc(){
        return view('Api/ApiDoc');
    }

    public function getAllBeneficiaries(){
        $userModel=new UserModel();
        $allBeneficiaries=$userModel->getUserWhere(['Type'=>'Beneficiary']);
        echo json_encode($allBeneficiaries);
    }

    public function getAllContributors(){
        $userModel=new UserModel();
        $allContributors=$userModel->getUserWhere(['Type'=>'Contributor']);
        echo json_encode($allContributors);
    }

    public function getAllEvents(){
        $eventModel=new EventModel();
        $allEvents=$eventModel->getAllEvents();
        echo json_encode($allEvents);
    }

    public function getAllFinancials(){
        $financialModel=new FinancialModel();
        $allFinancials=$financialModel->getAllFinancials();
        echo json_encode($allFinancials);
    }

    public function getAllSuggestions(){
        $suggestionModel=new SuggestionModel();
        $allSuggestions=$suggestionModel->getAllSuggestions();
        echo json_encode($allSuggestions);
    }

    public function getAllOpportunities(){
        $opportunityModel=new OpportunityModel();
        $allOpportunities=$opportunityModel->getAllOpportunities();
        echo json_encode($allOpportunities);
    }
}