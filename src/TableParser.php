<?php

namespace TennisScoresGrabber\XScores;

use DOMElement;
use DOMNodeList;
use DOMXPath;
use TennisScoresGrabber\XScores\Contracts\Entities\Game;
use TennisScoresGrabber\XScores\Contracts\Entities\Group;
use TennisScoresGrabber\XScores\Contracts\TableParserInterface;

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
        /** @var Group[] $groups */
        $groups = [];

        $rows = $this->getRows($scoresTable);
        $rowsCount = $rows->length;

        $startRow = self::SKIP_ROWS_COUNT_START;
        $endRow = $rowsCount - self::SKIP_ROWS_COUNT_END;

        $i = $startRow;

        while ($i < $endRow) {
            $row = $rows[$i];

            $this->validateGroupNameRow($row, $i);
            $groups[] = $this->createGroup($rows, $i);
        }
    }

    private function validateGroupNameRow(DOMElement $row, $i)
    {
        $class = $row->getAttribute('class');

        if ($class !== 'score_row country_header mainListClick wrap') {
            throw new TableParserException(sprintf('Invalid class value ("%s") for Group Name row (i=%d).', $class, $i));
        }
    }

    private function createGroup($rows, &$i)
    {
        $i++;
    }

    private function getRows(DOMElement $scoresTable): DOMNodeList
    {
        $xPath = new DOMXPath($scoresTable->ownerDocument);

        return $xPath->query('div', $scoresTable);
    }

    private function getRowsCount(DOMElement $scoresTable)
    {
        return $scoresTable->childNodes->length;
    }
}
