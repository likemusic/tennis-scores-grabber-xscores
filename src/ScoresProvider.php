<?php

namespace TennisScoreGrabber\XScores;

use TennisScoreGrabber\Contracts\ScoresHtmlParserInterface;
use TennisScoreGrabber\Contracts\ScoresHtmlProviderInterface;
use TennisScoreGrabber\ScoresProvider as BaseScoresProvider;

class ScoresProvider extends BaseScoresProvider
{
    public function __construct(
        ScoresHtmlProviderInterface $scoresHtmlProvider,
        ScoresHtmlParserInterface $scoresHtmlParser
    ) {
        parent::__construct($scoresHtmlProvider, $scoresHtmlParser);
    }
}
