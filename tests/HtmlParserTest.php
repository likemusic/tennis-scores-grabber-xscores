<?php

namespace TennisScoresGrabber\XScores\Tests;

use PHPUnit\Framework\TestCase;
use TennisScoresGrabber\XScores\Helper\GameRowToGameConverter;
use TennisScoresGrabber\XScores\HtmlParser;
use TennisScoresGrabber\XScores\TableParser;

class HtmlParserTest extends TestCase
{
    const TEST_PAGE_FILENAME = 'tests/Fixtures/2019-07-01/page.html';
    const EXPECTED_SERIALIZED_SCORES_DATA_FILENAME = 'tests/Fixtures/2019-07-01/ScoresData.txt';

    public function testGetScoresDataByHtml()
    {
        $gameRowToGameConverter = new GameRowToGameConverter();
        $tableParser = new TableParser($gameRowToGameConverter);
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
        $serializedExpectedScoresData = file_get_contents(self::EXPECTED_SERIALIZED_SCORES_DATA_FILENAME);

        return unserialize($serializedExpectedScoresData);
    }
}
