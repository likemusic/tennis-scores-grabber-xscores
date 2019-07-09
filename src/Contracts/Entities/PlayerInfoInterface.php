<?php

namespace TennisScoresGrabber\XScores\Contracts\Entities;

/**
 * Interface PlayerInfo
 * @package TennisScoresGrabber\Contracts\Entities
 */
interface PlayerInfoInterface
{
    public function getName(): string;
    public function setName(string $name):self;

    public function getSeedPosition(): ?string;
    public function setSeedPosition(?string $seedPosition): self;

    public function getScoreFinal(): ?string;
    public function setScoreFinal(?string $finalScore): self;

    public function getScoreSet1(): ?string;
    public function setScoreSet1(?string $score): self;

    public function getScoreSet2(): ?string;
    public function setScoreSet2(?string $score): self;

    public function getScoreSet3(): ?string;
    public function setScoreSet3(?string $score): self;

    public function getScoreSet4(): ?string;
    public function setScoreSet4(?string $score): self;

    public function getScoreSet5(): ?string;
    public function setScoreSet5(?string $score): self;
}
