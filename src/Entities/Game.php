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

    public function getPlayerHome(): ?string
    {
        return $this->playerHome;
    }

    public function setPlayerHome(?string $player): GameInterface
    {
        $this->playerHome = $player;

        return $this;
    }

    public function getPlayerAway(): ?string
    {
        return $this->playerAway;
    }

    public function setPlayerAway(?string $player): GameInterface
    {
        $this->playerAway = $player;

        return $this;
    }

    public function getFinalScoreHome(): ?string
    {
        return $this->finalScoreHome;
    }

    public function setFinalScoreHome(?string $score): GameInterface
    {
        $this->finalScoreHome = $score;

        return $this;
    }

    public function getFinalScoreAway(): ?string
    {
        return $this->finalScoreAway;
    }

    public function setFinalScoreAway(?string $score): GameInterface
    {
        $this->finalScoreAway = $score;

        return $this;
    }
}
