<?php

namespace TennisScoresGrabber\XScores\Tests;

use PHPUnit\Framework\TestCase;
use TennisScoresGrabber\XScores\Helper\GameRowToGameConverter;
use TennisScoresGrabber\XScores\TableParser;

/**
 * Class TableParserTest
 * @package TennisScoresGrabber\XScores\Tests
 */
class TableParserTest extends TestCase
{
    public function testGetScoresData()
    {
        $gameRowToGameConverter = new GameRowToGameConverter();
        $tableParser = new TableParser($gameRowToGameConverter);
        $scoresTable = $this->getTestScoresTable();
        $tableParser->getScoresData($scoresTable);
    }
}
