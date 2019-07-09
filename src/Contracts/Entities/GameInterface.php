<?php

namespace TennisScoresGrabber\XScores\Contracts\Entities;

/**
 * Interface Game
 * @package TennisScoresGrabber\Contracts\Entities
 */
interface GameInterface
{
    public function getPlayersHome(): string;
    public function getPlayersAway(): string;

    public function getFinalScoreHome(): string;
    public function getFinalScoreAway(): string;
}
