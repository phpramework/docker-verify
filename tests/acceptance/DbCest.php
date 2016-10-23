<?php


class DbCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests

    public function tryToTestCanSeeSingleResult(AcceptanceTester $I)
    {
        $I->sendGET($_ENV['URI_DB']);

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();

        $I->seeResponseMatchesJsonType([
            'id' => 'integer',
            'randomNumber' => 'integer'
        ]);
    }
}
