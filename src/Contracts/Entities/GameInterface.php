<?php

namespace TennisScoresGrabber\XScores\Contracts\Entities;

interface GameInterface
{
    public function getPlayerHome();
    public function setPlayerHome($player): self;

    public function getPlayerAway();
    public function setPlayerAway($player): self;

    public function getFinalScoreHome();
    public function setFinalScoreHome($score): self;

    public function getFinalScoreAway();
    public function setFinalScoreAway($score): self;
}
