<?php
declare(strict_types=1);

namespace TennisScoresGrabber\XScores\Tests;

use DateTime;
use Likemusic\SimpleHttpClient\FileGetContents\SimpleHttpClient;
use PHPUnit\Framework\TestCase;
use TennisScoresGrabber\XScores\HtmlProvider;
use TennisScoresGrabber\XScores\UrlProvider;

/**
 * Class ScoresHtmlProviderTest
 * @package TennisScoreGrabber\Tests
 */
class HtmlProviderTest extends TestCase
{
    const TEST_DATE = TestDataInterface::DATE;

    public function testGetScoresHtmlByDate()
    {
        $simpleHttpClient = new SimpleHttpClient();
        $scoresUrlProvider = new UrlProvider();
        $scoresHtmlProvider = new HtmlProvider($simpleHttpClient, $scoresUrlProvider);

        $dateTime = new DateTime(self::TEST_DATE);
        $scoresHtml = $scoresHtmlProvider->getScoresHtmlByDate($dateTime);

        $this->assertNotEmpty($scoresHtml);
    }
}
