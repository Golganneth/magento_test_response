<?php
namespace Magento\Test\Util\Validation;

use Magento\Report;
use Magento\Util\Validation\ReportValidator;

class ReportValidatorTest extends \PHPUnit_Framework_TestCase {
    public function testValidateWhenEmptyTitleThenReturnFalse() {
        $report = new Report(
            new ReportValidator()    
        );
        $report->setDate();
        $report->setContent('Lorem ipsum dolor sit amet');
        
        $reportValidator = new ReportValidator();
        $this->assertFalse($reportValidator->validate($report));
    }
    
    public function testValidateWhenEmptyDateThenReturnFalse() {
        $report = new Report(
            new ReportValidator()
        );
      
        $report->setTitle('Test');
        $report->setContent('Lorem ipsum dolor sit amet');

        $reportValidator = new ReportValidator();
        $this->assertFalse($reportValidator->validate($report));
    }
    
    public function testValidateWhenEmptyContentThenReturnFalse() {
        $report = new Report(
            new ReportValidator()
        );
        
        $report->setTitle('Test');
        $report->setDate();
        
        $reportValidator = new ReportValidator();
        $this->assertFalse($reportValidator->validate($report));
    }
    
    public function testValidateWhenOKReportThenReturnTrue() {
        $report = new Report(
            new ReportValidator()
        );
        
        $report->setTitle('Test Title');
        $report->setDate();
        $report->setContent('Lorem ipsum dolor sit amet');
        $reportValidator = new ReportValidator();
        $this->assertTrue($reportValidator->validate($report));
    }
}
?>