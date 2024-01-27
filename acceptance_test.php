<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class AcceuilPageCheckCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see("Quiz sur l'histoire du Bénin");
        $I->seeInTitle("Quiz sur l'histoire du Bénin");

    }
}
