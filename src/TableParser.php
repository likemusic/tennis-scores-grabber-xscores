<?php

namespace TennisScoresGrabber\XScores;

use DOMElement;
use DOMNodeList;
use DOMXPath;
use TennisScoresGrabber\XScores\Contracts\Entities\GameInterface;
use TennisScoresGrabber\XScores\Contracts\Entities\CompetitionInterface;
use TennisScoresGrabber\XScores\Contracts\TableParserInterface;
use TennisScoresGrabber\XScores\Entities\Competition;
use TennisScoresGrabber\XScores\Entities\Game;

class TableParser implements TableParserInterface
{
    const SKIP_ROWS_COUNT_START = 2;
    const SKIP_ROWS_COUNT_END = 2;

    /**
     * @param $scoresTable
     * @throws TableParserException
     */
    public function getScoresData(DOMElement $scoresTable)
    {
        /** @var CompetitionInterface[] $groups */
        $groups = [];

        $rows = $this->getRows($scoresTable);
        $rowsCount = $rows->length;

        $startRow = self::SKIP_ROWS_COUNT_START;
        $endRow = $rowsCount - self::SKIP_ROWS_COUNT_END - 1;

        $i = $startRow;

        while ($i < $endRow) {
            $row = $rows[$i];

            if (!$this->isCompetitionRow($row)) {
                $i++;
                continue;
            }

            $groups[] = $this->createCompetitionWithGamesByRows($rows, $i, $endRow);
        }

        return $groups;
    }

    private function isCompetitionRow(DOMElement $row)
    {
        $class = $row->getAttribute('class');

        return ($class === 'score_row country_header mainListClick wrap');
    }

    private function createCompetitionWithGamesByRows($rows, &$i, $endRow)
    {
        $competition = $this->createCompetitionByRow($rows[$i]);

        while ($i < $endRow) {
            $i++;
            $row = $rows[$i];

            if ($this->isCompetitionRow($row)) {
                return $competition;
            } elseif (!$this->isGameRow($row)) {
                continue;
            }

            $game = $this->createGameWithPlayersByRow($row);
            $competition->addGame($game);
        }

        return $competition;
    }

    private function createGameWithPlayersByRow(DOMElement $row): GameInterface
    {
        $game = $this->createGameByRow($row);

        return $game;
    }

    /**
     * @param DOMElement $row
     * @return GameInterface
     */
    private function createGameByRow(DOMElement $row): GameInterface
    {
        return new Game($row);
    }

    private function isGameRow(DOMElement $row)
    {
        $class = $row->getAttribute('class');

        return $this->startsWith($class, 'match_line score_row other_match');
    }

    private function startsWith(string $string, string $startString)
    {
        $len = strlen($startString);

        return (substr($string, 0, $len) === $startString);
    }

    private function createCompetitionByRow(DOMElement $row): CompetitionInterface
    {
        return new Competition($row);
    }

    private function getRows(DOMElement $scoresTable): DOMNodeList
    {
        $xPath = new DOMXPath($scoresTable->ownerDocument);

        return $xPath->query('div', $scoresTable);
    }
}
