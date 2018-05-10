<?php
namespace Magento\Test\Domain;

use Magento\Domain\Report;

class ReportTest extends \PHPUnit_Framework_TestCase{
    public function testConstructorWhenCalledThenAttributesAreEmpty() {
        $report = new Report();
        $this->assertNull($report->getTitle());
        $this->assertNull($report->getDate());
        $this->assertNull($report->getContent());
    }
    
    public function testSetDateWhenEmptyDateThenContainsActualDate() {
        $report = new Report();
        $currentTimestamp = date('y-m-d h:i:s');
        $report->setDate();
        $this->assertGreaterThanOrEqual($currentTimestamp, $report->getDate());
        $this->assertLessThanOrEqual(date('y-m-d h:i:s'), $report->getDate());
    }
}