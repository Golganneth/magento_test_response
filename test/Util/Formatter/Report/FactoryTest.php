<?php
namespace Magento\Test\Util\Formatter\Report;

use Magento\Util\Formatter\Report\Factory as ReportFactory;
use Magento\Util\Formatter\Exception\UnknownFormatException;

class FactoryTest extends \PHPUnit_Framework_TestCase {
    public function testGetInstanceWhenHtmlFormatThenReturnHtmlFormatter() {
        $factory = new ReportFactory();
        $formatter = $factory->getInstance(ReportFactory::HTML);
        
        $this->assertInstanceOf('Magento\\Util\\Formatter\\Report\\HtmlFormatter', $formatter);
    }
   
    public function testGetInstanceWhenJsonFormatThenReturnJsonFormatter() {
        $factory = new ReportFactory();
        $formatter = $factory->getInstance(ReportFactory::JSON);
        
        $this->assertInstanceOf('Magento\\Util\\Formatter\\Report\\JsonFormatter', $formatter);
    }
    
    public function testGetInstanceWhenUnknownFormatThenThrowException() {
        $factory = new ReportFactory();
        $this->expectException(UnknownFormatException::class);
        $formatter = $factory->getInstance("UnknownType");
    }
}

?>