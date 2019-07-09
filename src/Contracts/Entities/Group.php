<?php

namespace TennisScoresGrabber\XScores\Contracts\Entities;

/**
 * Interface Group
 * @package TennisScoresGrabber\Contracts\Entities
 */
interface Group
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * @return Game[]
     */
    public function getGames():array;

    /**
     * @param Game[] $games
     * @return self
     */
    public function setGames(array $games):self;

    /**
     * @param Game $game
     * @return self
     */
    public function addGame(Game $game):self;
}
