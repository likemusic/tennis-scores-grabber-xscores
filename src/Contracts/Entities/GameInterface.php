<?php

namespace TennisScoresGrabber\XScores\Contracts\Entities;

interface GameInterface
{
    public function getPlayerHome(): ?string;
    public function setPlayerHome(?string $player): self;

    public function getPlayerAway(): ?string;
    public function setPlayerAway(?string  $player): self;

    public function getFinalScoreHome(): ?string;
    public function setFinalScoreHome(?string $score): self;

    public function getFinalScoreAway(): ?string;
    public function setFinalScoreAway(?string $score): self;
}
