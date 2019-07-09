<?php

namespace TennisScoresGrabber\XScores\Contracts\Helper;


use DOMElement;

interface XPathInterface
{
    /**
     * @param DOMElement $
     * @return mixed
     */
    public function evaluate(DOMElement $DOMElement, $expression);
}
