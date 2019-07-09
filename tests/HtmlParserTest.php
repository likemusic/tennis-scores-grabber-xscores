<?php

namespace TennisScoresGrabber\XScores\Tests;

use PHPUnit\Framework\TestCase;
use TennisScoresGrabber\XScores\HtmlParser;
use TennisScoresGrabber\XScores\TableParser;

class HtmlParserTest extends TestCase
{
    const TEST_PAGE_FILENAME = 'tests/Fixtures/2019-07-01/page.html';

    public function testGetScoresDataByHtml()
    {
        $tableParser = new TableParser();
        $htmlParser = new HtmlParser($tableParser);

        $sourceHtml = $this->getTestSourceHtml();

        $scoresData = $htmlParser->getScoresDataByHtml($sourceHtml);
        $expectedScoresData = $this->getExpectedScoresData();

        $this->assertEquals($expectedScoresData, $scoresData);
    }

    /**
     * @return string
     */
    private function getTestSourceHtml()
    {
        return file_get_contents(self::TEST_PAGE_FILENAME);
    }

    /**
     * @return array
     */
    private function getExpectedScoresData()
    {
        return [];
    }
}
