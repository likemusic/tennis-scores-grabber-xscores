<?php

namespace TennisScoresGrabber\XScores\Tests;

use PHPUnit\Framework\TestCase;
use TennisScoresGrabber\XScores\TableParser;

/**
 * Class TableParserTest
 * @package TennisScoresGrabber\XScores\Tests
 */
class TableParserTest extends TestCase
{
    public function testGetScoresData()
    {
        $tableParser = new TableParser();
        $scoresTable = $this->getTestScoresTable();
        $tableParser->getScoresData($scoresTable);
    }
}
