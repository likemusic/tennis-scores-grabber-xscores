<?php

namespace TennisScoresGrabber\XScores\Contracts\Helper;

use DOMElement;
use TennisScoresGrabber\XScores\Contracts\Entities\GameInterface;

interface GameRowToGameConverterInterface
{
    public function convert(DOMElement $gameRow): GameInterface;
}
