<?php

namespace TennisScoresGrabber\XScores;

use Likemusic\SimpleHttpClient\HttpClientInterface;
use TennisScoresGrabber\ScoresHtmlProvider as BaseScoresHtmlProvider;
use TennisScoresGrabber\XScores\Contracts\ScoresUrlProviderXScoreInterface;

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
