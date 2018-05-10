<?php
namespace Magento\Test\Util\Formatter\Report;

use Magento\Util\Formatter\Report\HtmlFormatter;
use Magento\Report;
use Magento\Util\Validation\ReportValidator;

class HtmlFormatterTest extends \PHPUnit_Framework_TestCase {
    public function testFormatWhenReportThenReturnFormattedString() {
        $formatter = new HtmlFormatter();
        $report = new Report(
            new ReportValidator()
        );
        $report->setTitle('Test title');
        $report->setDate('2018-01-01 00:00:00');
        $report->setContent('Lorem ipsum dolor sit amet');

        $this->assertEquals('<h1>Test title</h1> .
            <p>2018-01-01 00:00:00</p> .
            <div class=\'content\'>Lorem ipsum dolor sit amet</div> .', trim($formatter->format($report)));
    }
}
?>