<?php

namespace TennisScoresGrabber\XScores;

use TennisScoresGrabber\XScores\Contracts\HtmlParserInterface;
use TennisScoresGrabber\HtmlParser as BaseHtmlParser;

class HtmlParser extends BaseHtmlParser implements HtmlParserInterface
{
    const SCORES_TABLE_SELECTOR = '//*[@id="scoretable"]';

    protected function getScoresTableSelector(): string
    {
        return self::SCORES_TABLE_SELECTOR;
    }
}
