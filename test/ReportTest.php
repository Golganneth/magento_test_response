<?php

namespace Magento\Test;

use Magento\Report;
use Magento\Util\Validation\ReportValidator;

class ReportTest extends \PHPUnit_Framework_TestCase
{   
    public function testSendReportWhenHtmlFormatAndValidReportThenReturnTrue()
    {
        $reportValidatorStub = $this->createMock(ReportValidator::class);
        $reportValidatorStub->method('validate')
                            ->willReturn(true);
        
        $report = new Report(
            $reportValidatorStub
        );

        $types = ['HTML', 'JSON'];

        foreach ($types as $type){
            $this->assertTrue($report->sendReport($type));
        }
    }
    
    public function testSendReportWhenHtmlFormatAndInvalidReportThenReturnFalse() {
        $reportValidatorStub = $this->createMock(ReportValidator::class);
        $reportValidatorStub->method('validate')
                            ->willReturn(false);
        
        $report = new Report(
            $reportValidatorStub
        );
        
        $types = ['HTML', 'JSON'];
        
        foreach ($types as $type){
            $this->assertFalse($report->sendReport($type));
        }
    }
}
