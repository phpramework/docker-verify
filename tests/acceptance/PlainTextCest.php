<?php


class PlainTextCest
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
        $I->sendGET($_ENV['URI_PLAINTEXT']);

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->canSeeHttpHeader('Content-Type', 'text/plain; charset=UTF-8');
        $I->seeResponseContains('Hello, World!');
    }
}
