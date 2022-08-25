<?php

namespace web\work\assessment\Controller;

use web\work\assessment\App\View;
use web\work\assessment\Config\Database;
use web\work\assessment\Service\PromotionService;
use web\work\assessment\Model\SetBenefitRuleRequest;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Repository\BenefitRuleRepository;

class PromotionController
{
    private PromotionService $promotionService;

    public function __construct()
    {
        $connection = Database::getConnection();

        $benefitRuleRepository = new BenefitRuleRepository($connection);
        $this->promotionService = new PromotionService($benefitRuleRepository);
        
    }

    function promotion(): void
    {
        $user_info = [];
        $code_info = [];
        if(!empty($_COOKIE['USER_INFO'])){
            $user_info = unserialize(base64_decode($_COOKIE['USER_INFO']));
        }
        if(!empty($_COOKIE['CODE_CC'])){
            $code_info = unserialize(base64_decode($_COOKIE['CODE_CC']));
        }
        View::render('home/promotions',[
            "title"=>"Promotion",
            "user_info"=>$user_info,
            "code"=>$code_info
        ],true);
    }

    public function postSetBenefitRule()
    {
        $user_info = unserialize(base64_decode($_COOKIE['USER_INFO']));

        $req = new SetBenefitRuleRequest();
        $req->setUserId($user_info['userId']);
        $req->setRuleId($_POST['ruleId']);
        $req->setPromotionType($_POST['promotionType']);
        $req->setContract($_POST['contract']);
        $req->setDepartement($_POST['departement']);
        $req->setPrincipalSalary($_POST['principalSalary']);
        $req->setTargetOfDay($_POST['targetOfDay']);
        $req->setInterestSalary($_POST['interestSalary']);
        $req->setPromotionStandart($_POST['promotionStandart']);
        $req->setRemark($_POST['remark']);

        try {
            $this->promotionService->register($req);

            View::redirect('/home/promotions');

        } catch (ValidationException $e) {
            View::redirect('/home/promotions');
        }

    }
}