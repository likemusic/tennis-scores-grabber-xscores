<?php

namespace TennisScoresGrabber\XScores;

use Likemusic\SimpleHttpClient\HttpClientInterface;
use TennisScoresGrabber\HtmlProvider as BaseScoresHtmlProvider;
use TennisScoresGrabber\XScores\Contracts\UrlProviderInterface;
use TennisScoresGrabber\XScores\Contracts\HtmlProviderInterface;

class HtmlProvider extends BaseScoresHtmlProvider implements HtmlProviderInterface
{
    public function __construct(HttpClientInterface $httpClient, UrlProviderInterface $scoresUrlProvider)
    {
        parent::__construct($httpClient, $scoresUrlProvider);
    }
}
