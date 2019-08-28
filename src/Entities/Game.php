<?php
namespace TennisScoresGrabber\XScores\Entities;

use TennisScoresGrabber\XScores\Contracts\Entities\GameInterface;

class Game implements GameInterface
{
    /** @var string|null */
    private $playerHome;

    /** @var string|null */
    private $playerAway;

    /** @var string|null */
    private $finalScoreHome;

    /** @var string|null */
    private $finalScoreAway;

    public function getPlayerHome()
    {
        return $this->playerHome;
    }

    public function setPlayerHome($player): GameInterface
    {
        $this->playerHome = $player;

        return $this;
    }

    public function getPlayerAway()
    {
        return $this->playerAway;
    }

    public function setPlayerAway($player): GameInterface
    {
        $this->playerAway = $player;

        return $this;
    }

    public function getFinalScoreHome()
    {
        return $this->finalScoreHome;
    }

    public function setFinalScoreHome($score): GameInterface
    {
        $this->finalScoreHome = $score;

        return $this;
    }

    public function getFinalScoreAway()
    {
        return $this->finalScoreAway;
    }

    public function setFinalScoreAway($score): GameInterface
    {
        $this->finalScoreAway = $score;

        return $this;
    }
}
