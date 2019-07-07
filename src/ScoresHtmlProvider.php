<?php

namespace TennisScoreGrabber\Xscores;

use TennisScoreGrabber\Contracts\HttpClientInterface;
use TennisScoreGrabber\ScoresHtmlProvider as BaseScoresHtmlProvider;
use TennisScoreGrabber\XScores\Contracts\ScoresUrlProviderXScoreInterface;

/**
 * Class ScoresHtmlProvider
 * @package TennisScoreGrabber\Xscores
 */
class ScoresHtmlProvider extends BaseScoresHtmlProvider
{
    public function __construct(HttpClientInterface $httpClient, ScoresUrlProviderXScoreInterface $scoresUrlProvider)
    {
        parent::__construct($httpClient, $scoresUrlProvider);
    }
}
