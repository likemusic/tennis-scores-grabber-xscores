<?php

namespace TennisScoresGrabber\XScores;

use DOMElement;
use DOMNodeList;
use DOMXPath;
use TennisScoresGrabber\XScores\Contracts\Entities\GameInterface;
use TennisScoresGrabber\XScores\Contracts\Helper\GameRowToGameConverterInterface;
use TennisScoresGrabber\XScores\Contracts\TableParserInterface;

class TableParser implements TableParserInterface
{
    private $gameRowToGameConverter;

    public function __construct(GameRowToGameConverterInterface $gameRowToGameConverter)
    {
        $this->gameRowToGameConverter = $gameRowToGameConverter;
    }

    /**
     * @param DOMElement $scoresTable
     * @return GameInterface[]
     */
    public function getScoresData(DOMElement $scoresTable)
    {
        $gameRows = $this->getGamesRows($scoresTable);

        $games = [];

        foreach ($gameRows as $gameRow) {
            $games[] = $this->createGameByRow($gameRow);
        }

        return $games;
    }

    private function getGamesRows(DOMElement $scoresTable): DOMNodeList
    {
        $xPath = new DOMXPath($scoresTable->ownerDocument);

        return $xPath->query('div[starts-with(@class,"match_line score_row other_match")]', $scoresTable);
    }

    /**
     * @param DOMElement $row
     * @return GameInterface
     */
    private function createGameByRow(DOMElement $row): GameInterface
    {
        return $this->gameRowToGameConverter->convert($row);
    }
}
