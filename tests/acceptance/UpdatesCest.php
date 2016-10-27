<?php


class UpdatesCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests

    private function generateUri(int $queries = null): string
    {
        $uri = $_ENV['URI_UPDATES'];
        if (! is_null($queries)) {
            $uri .= $queries;
        }

        return $uri;
    }

    public function tryToTestCanSeeMultipleResult(AcceptanceTester $I)
    {
        $queries = 25;
        $I->sendGET($this->generateUri($queries));

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();

        for ($i = 0; $i < $queries; $i++) {
            $I->seeResponseMatchesJsonType([
                'id' => 'integer',
                'randomNumber' => 'integer'
            ], sprintf('$.[%d]', $i));
        }
    }

    public function tryToTestMaxAre500Queries(AcceptanceTester $I)
    {
        $queries = 501;
        $I->sendGET($this->generateUri($queries));

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();

        $I->cantSeeResponseJsonMatchesJsonPath('$.[500].id');
    }
}
