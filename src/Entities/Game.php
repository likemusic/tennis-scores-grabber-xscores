<?php
namespace TennisScoresGrabber\XScores\Entities;

use DOMElement;
use TennisScoresGrabber\XScores\Contracts\Entities\GameInterface;

class Game implements GameInterface
{
    /** @var DOMElement */
    private $DOMElement;

    /**
     * Game constructor.
     * @param DOMElement $DOMElement
     */
    public function __construct(DOMElement $DOMElement)
    {
        $this->DOMElement = $DOMElement;
    }

    public function getPlayersHome(): string
    {
        $playersDomElement = $this->getPlayersDomElement();


    }

    private function getPlayersDomElement()
    {

    }

    public function getPlayersAway(): string
    {
        // TODO: Implement getPlayersAway() method.
    }

    public function getFinalScoreHome(): string
    {
        // TODO: Implement getFinalScoreHome() method.
    }

    public function getFinalScoreAway(): string
    {
        // TODO: Implement getFinalScoreAway() method.
    }


}
