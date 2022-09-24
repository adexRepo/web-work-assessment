<?php

namespace web\work\assessment\Controller;

use web\work\assessment\App\View;
use web\work\assessment\Module\Dates;
use web\work\assessment\Config\Database;
use web\work\assessment\Service\PackageService;
use web\work\assessment\Model\BenefitRuleRequest;
use web\work\assessment\Service\PromotionService;
use web\work\assessment\Model\SetBenefitRuleRequest;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Repository\BenefitRuleRepository;
use web\work\assessment\Repository\PackageSendedTraceRepository;
use web\work\assessment\Model\SummaryWorkHistoryRequest;

class PromotionController
{
    private PromotionService $promotionService;
    private PackageService $packageService;

    public function __construct()
    {
        $connection = Database::getConnection();

        $benefitRuleRepository = new BenefitRuleRepository($connection);
        $this->promotionService = new PromotionService($benefitRuleRepository);
        $packageRepository = new PackageSendedTraceRepository($connection);
        $this->packageService = new PackageService($packageRepository);
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

            View::redirect('/promotion/promotions');

        } catch (ValidationException $e) {
            View::redirect('/promotion/promotions');
        }

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

        $month = date('Ym', strtotime(Dates::dateNowMonth())).'%';


        $req = new BenefitRuleRequest();
        $req->setDept((int)$user_info['departement']);
        $req->setContract($user_info['contract']);

        $req2 = new SummaryWorkHistoryRequest();
        $req2->setUserId($user_info['userId']);

        try {
            $rule = $this->promotionService->benefitRule($req);
            $package = $this->packageService->averagePackageMonth($month);
            $summary = $this->packageService->summaryWorkHistory($req2);

        } catch (ValidationException $e) {
            View::redirect('/');
        }

        View::render('promotion/promotions',[
            "title"=>"Promotion",
            "user_info"=>$user_info,
            "code"=>$code_info,
            "rule"=>$rule->getBenefit(),
            "average"=>$package->getAveragePackageMonthly(),
            "summary"=>$summary->getSummary()
        ],true);
    }

}