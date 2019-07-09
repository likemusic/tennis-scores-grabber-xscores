<?php

namespace TennisScoresGrabber\XScores\Contracts\Entities;

/**
 * Interface Group
 * @package TennisScoresGrabber\Contracts\Entities
 */
interface CompetitionInterface
{
    /**
     * @return string
     */
    public function getFullName(): ?string;

    /**
     * @return string|null
     */
//    public function getStartDate(): ?string;

    /**
     * @return string|null
     */
//    public function getEndDate(): ?string;

    /**
     * @return GameInterface[]
     */
    public function getGames():array;

    /**
     * @param GameInterface[] $games
     * @return CompetitionInterface
     */
    public function setGames(array $games): self;

    /**
     * @param GameInterface $game
     * @return CompetitionInterface
     */
    public function addGame(GameInterface $game): self;
}
