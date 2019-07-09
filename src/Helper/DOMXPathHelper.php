<?php

namespace TennisScoresGrabber\XScores\Helper;

use DOMElement;
use DOMXPath;
use TennisScoresGrabber\XScores\Contracts\Helper\XPathInterface;

class DOMXPathHelper implements XPathInterface
{
    private $XPaths = [];

    public function evaluate(DOMElement $DOMElement, $expression)
    {
        $DOMXPath = $this->getDOMXPath($DOMElement);
        return $DOMXPath->evaluate($expression, $DOMElement);
    }

    private function getDOMXPath(DOMElement $DOMElement)
    {
        $domElementDocumentHash = $this->getDOMElementDocumentHash($DOMElement);

        if (!array_key_exists($domElementDocumentHash, $this->XPaths)) {
            $this->XPaths[$domElementDocumentHash] = new DOMXPath($DOMElement->ownerDocument);
        }

        return $this->XPaths[$domElementDocumentHash];
    }
}
