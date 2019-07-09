<?php

namespace TennisScoresGrabber\XScores\Helper;

use DOMElement;
use DOMXPath;
use TennisScoresGrabber\XScores\Contracts\Entities\GameInterface;
use TennisScoresGrabber\XScores\Contracts\Helper\GameRowToGameConverterInterface;
use TennisScoresGrabber\XScores\Entities\Game;

class GameRowToGameConverter implements GameRowToGameConverterInterface
{
    /** @var DOMXPath */
    private $XPath;

    public function convert(DOMElement $gameRow): GameInterface
    {
        $this->XPath = new DOMXPath($gameRow->ownerDocument);

        $playersDOMElement = $this->getPlayersDomElement($gameRow);
        $playerHome = $this->getPlayerHomeByPlayersDomElement($playersDOMElement);
        $playerAway = $this->getPlayerAwayByPlayersDomElement($playersDOMElement);

        $finalScoresDOMElement = $this->getFinalScoresDOMElement($gameRow);
        $finalScoreHome = $this->getFinalScoreHomeByFinalScoresDomElement($finalScoresDOMElement);
        $finalScoreAway = $this->getFinalScoreAwayByFinalScoresDomElement($finalScoresDOMElement);

        $game = new Game();
        $game
            ->setPlayerHome($playerHome)
            ->setPlayerAway($playerAway)
            ->setFinalScoreHome($finalScoreHome)
            ->setFinalScoreAway($finalScoreAway)
        ;

        return $game;
    }

    private function getPlayersDomElement(DOMElement $gameRow)
    {
        return $this->getFirstByXPath($gameRow,'div[@class="score_teams score_cell"]');
    }

    private function getFirstByXPath(DOMElement $DOMElement, $expression)
    {
        return $this->getByXPath($DOMElement, $expression)[0];
    }

    private function getByXPath(DOMElement $DOMElement, $expression)
    {
        return $this->XPath->query($expression, $DOMElement);
    }

    private function getPlayerHomeByPlayersDomElement(DOMElement $playersDOMElement)
    {
        return $this->evaluateByXPath($playersDOMElement, 'string(div[@class="score_home score_cell"]/div[@class="score_home_txt score_cell wrap"]/span)');
    }

    private function evaluateByXPath(DOMElement $DOMElement, $expression)
    {
        return $this->XPath->evaluate($expression, $DOMElement);
    }

    private function getPlayerAwayByPlayersDomElement(DOMElement $playersDOMElement)
    {
        return $this->evaluateByXPath($playersDOMElement, 'string(div[@class="score_away score_cell"]/div[@class="score_away_txt score_cell wrap"]/span)');
    }

    private function getFinalScoresDomElement(DOMElement $gameRow)
    {
        return $this->getFirstByXPath($gameRow,'div[@class="score_ft score_cell centerTXT"]');
    }

    private function getFinalScoreHomeByFinalScoresDomElement(DOMElement $finalScoresDOMElement)
    {
        return $this->evaluateByXPath($finalScoresDOMElement, 'string(div[@class="scoreh_ft border_bottom score_cell centerTXT"])');
    }

    private function getFinalScoreAwayByFinalScoresDomElement(DOMElement $finalScoresDOMElement)
    {
        return $this->evaluateByXPath($finalScoresDOMElement, 'string(div[@class="scorea_ft score_cell centerTXT"])');
    }
}
