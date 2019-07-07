<?php
declare(strict_types=1);

namespace TennisScoresGrabber\XScores\Tests;

use DateTime;
use PHPUnit\Framework\TestCase;
use TennisScoresGrabber\XScores\ScoresUrlProvider;

class ScoresUrlProviderTest extends TestCase
{
    const TEST_DATE = TestDataInterface::DATE;
    const EXPECTED_URL = 'https://www.xscores.com/tennis/livescores/01-07';

    public function testGetUrlByDateTime():void
    {
        $datetime = new DateTime(self::TEST_DATE);

        $urlProvider = new ScoresUrlProvider();
        $testUrl = $urlProvider->getUrlByDateTime($datetime);

        $this->assertEquals(self::EXPECTED_URL, $testUrl);
    }
}
