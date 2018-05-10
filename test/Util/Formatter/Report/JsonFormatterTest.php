<?php
namespace Magento\Test\Formatter\Report;

use Magento\Util\Formatter\Report\JsonFormatter;
use Magento\Report;
use Magento\Util\Validation\ReportValidator;

class JsonFormatterTest extends \PHPUnit_Framework_TestCase {
    public function testFormatWhenReportThenReturnFormattedString() {
        $formatter = new JsonFormatter();
        $report = new Report(
            new ReportValidator()    
        );
        $report->setTitle('Test title');
        $report->setDate('2018-01-01 00:00:00');
        $report->setContent('Lorem ipsum dolor sit amet');
        
        $this->assertEquals($formatter->format($report), '{"title":"Test title","date":"2018-01-01 00:00:00","content":"Lorem ipsum dolor sit amet"}');
    }
}
?>