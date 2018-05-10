<?php
namespace Magento\Util\Formatter\Report;

use Magento\Util\Formatter\FormatterInterface;

class JsonFormatter implements FormatterInterface {
    public function format($report) {
        return json_encode($report->toArray());
    }
}
?>
