<?php

namespace TennisScoresGrabber\XScores\Contracts\Entities;

/**
 * Interface Game
 * @package TennisScoresGrabber\Contracts\Entities
 */
interface Game
{
    public function getTime(): string;
    public function setTime(string $time): self;

    public function getStatus(): string;
    public function setStatus(string $status);

    public function getRound(): string;
    public function setRound(string $round);

    /**
     * @return PlayerInfo[]
     */
    public function getPlayersInfo(): array;

    /**
     * @param PlayerInfo[] $playersInfo
     * @return self
     */
    public function setPlayersInfo(array $playersInfo): self;
}
