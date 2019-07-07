<?php

namespace TennisScoreGrabber\XScores;

use DateTime;
use TennisScoreGrabber\XScores\Contracts\ScoresUrlProviderXScoreInterface;

class ScoresUrlProvider implements ScoresUrlProviderXScoreInterface
{
    const URL_TEMPLATE = 'https://www.xscores.com/tennis/livescores/{day}-{month}';

    /**
     * @param DateTime $dateTime
     * @return string
     */
    public function getUrlByDateTime(DateTime $dateTime)
    {
        $urlDay = $this->getUrlDay($dateTime);
        $urlMonth = $this->getUrlMonth($dateTime);

        $search = ['{day}', '{month}'];
        $replace = [$urlDay, $urlMonth];

        return str_replace($search, $replace, self::URL_TEMPLATE);
    }

    /**
     * @param DateTime $dateTime
     * @return string
     */
    private function getUrlDay(DateTime $dateTime)
    {
        return $dateTime->format('d');
    }

    /**
     * @param DateTime $dateTime
     * @return string
     */
    private function getUrlMonth(DateTime $dateTime)
    {
        return $dateTime->format('m');
    }
}
