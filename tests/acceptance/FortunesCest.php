<?php


class FortunesCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests

    public function tryToTestCanSeeFortuneMessages(AcceptanceTester $I)
    {
        $I->sendGET($_ENV['URI_FORTUNES']);

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->canSeeHttpHeader('Content-Type', 'text/html; charset=UTF-8');

        $I->canSeeResponseContains('Additional fortune added at request time.');

        $I->canSeeResponseContains('fortune: No such file or directory');
        $I->canSeeResponseContains('A computer scientist is someone who fixes things that aren&#039;t broken.');
        $I->canSeeResponseContains('After enough decimal places, nobody gives a damn.');
        $I->canSeeResponseContains('A bad random number generator: 1, 1, 1, 1, 1, 4.33e+67, 1, 1, 1');
        $I->canSeeResponseContains('A computer program does what you tell it to do, not what you want it to do.');
        $I->canSeeResponseContains('Emacs is a nice operating system, but I prefer UNIX. — Tom Christaensen');
        $I->canSeeResponseContains('Any program that runs right is obsolete.');
        $I->canSeeResponseContains('A list is only as strong as its weakest link. — Donald Knuth');
        $I->canSeeResponseContains('Feature: A bug with seniority.');
        $I->canSeeResponseContains('Computers make very fast, very accurate mistakes.');
        $I->canSeeResponseContains('&lt;script&gt;alert(&quot;This should not be displayed in a browser alert box.&quot;);&lt;/script&gt;');
        $I->canSeeResponseContains('フレームワークのベンチマーク');
    }
}
