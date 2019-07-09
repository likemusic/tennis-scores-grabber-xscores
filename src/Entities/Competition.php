<?php

namespace TennisScoresGrabber\XScores\Entities;

use DOMElement;
use DOMXPath;
use TennisScoresGrabber\XScores\Contracts\Entities\GameInterface;
use TennisScoresGrabber\XScores\Contracts\Entities\CompetitionInterface;

class Competition implements CompetitionInterface
{
    /** @var DOMElement */
    private $domElement;

    /** @var DOMXPath */
    private $domXPath;

    /** @var GameInterface[] */
    private $games;

    public function __construct(DOMElement $domElement)
    {
        $this->domElement = $domElement;
    }

    public function getFullName(): ?string
    {
        $domXPath = $this->getXPath();

        return $domXPath->evaluate('string(div[@class="country_header_txt"])', $this->domElement);
    }

    public function getGames(): array
    {
        return $this->games;
    }

    public function setGames(array $games): CompetitionInterface
    {
        $this->games = $games;

        return $this;
    }

    public function addGame(GameInterface $game): CompetitionInterface
    {
        $this->games[] = $game;

        return $this;
    }

    private function getXPath()
    {
        if ($this->domXPath == null) {
            $domDocument = $this->domElement->ownerDocument;
            $this->domXPath = new DOMXPath($domDocument);
        }

        return $this->domXPath;
    }
}
