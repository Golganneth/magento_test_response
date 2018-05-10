<?php
namespace Magento\Util\Formatter\Report;

use Magento\Util\Formatter\FormatterInterface;

class HtmlFormatter implements FormatterInterface {
    public function format ($report) {
        return "
            <h1>{$report->getTitle()}</h1> .
            <p>{$report->getDate()}</p> .
            <div class='content'>{$report->getContent()}</div> .
        ";
    }
}
?>