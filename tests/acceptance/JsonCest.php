<?php


class JsonCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests

    public function tryToTestCanSeeHelloWorld(AcceptanceTester $I)
    {
        $I->sendGET($_ENV['URI_JSON']);

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();

        $I->seeResponseContainsJson([
            'message' => 'Hello, World!'
        ]);
    }
}
