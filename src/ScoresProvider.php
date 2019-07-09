<?php

namespace TennisScoreGrabber\XScores;

use TennisScoresGrabber\ScoresProvider as BaseScoresProvider;
use TennisScoresGrabber\XScores\Contracts\HtmlParserInterface;
use TennisScoresGrabber\XScores\Contracts\HtmlProviderInterface;
use TennisScoresGrabber\XScores\Contracts\ScoresProviderInterface;

class ScoresProvider extends BaseScoresProvider implements ScoresProviderInterface
{
    public function __construct(
        HtmlProviderInterface $scoresHtmlProvider,
        HtmlParserInterface $scoresHtmlParser
    ) {
        parent::__construct($scoresHtmlProvider, $scoresHtmlParser);
    }
}
