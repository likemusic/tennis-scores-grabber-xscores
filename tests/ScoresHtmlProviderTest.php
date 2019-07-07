<?php
declare(strict_types=1);

namespace TennisScoresGrabber\XScores\Tests;

use DateTime;
use Likemusic\SimpleHttpClient\FileGetContents\SimpleHttpClient;
use PHPUnit\Framework\TestCase;
use TennisScoresGrabber\XScores\ScoresHtmlProvider;
use TennisScoresGrabber\XScores\ScoresUrlProvider;

/**
 * Class ScoresHtmlProviderTest
 * @package TennisScoreGrabber\Tests
 */
class ScoresHtmlProviderTest extends TestCase
{
    const TEST_DATE = '2019-07-01';
    const EXPECTED_HTML_CONTENT_FILENAME = 'tests/Fixtures/' . self::TEST_DATE . '.html';

    public function testGetScoresHtmlByDate()
    {
        $simpleHttpClient = new SimpleHttpClient();
        $scoresUrlProvider = new ScoresUrlProvider();
        $scoresHtmlProvider = new ScoresHtmlProvider($simpleHttpClient, $scoresUrlProvider);

        $dateTime = new DateTime(self::TEST_DATE);
        $scoresHtml = $scoresHtmlProvider->getScoresHtmlByDate($dateTime);

        $this->assertNotEmpty($scoresHtml);
    }
}
