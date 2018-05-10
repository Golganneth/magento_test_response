<?php
namespace Magento\Util\Formatter\Report;

use Magento\Util\Formatter\Report\HtmlFormatter;
use Magento\Util\Formatter\Report\JsonFormatter;
use Magento\Util\Formatter\Exception\UnknownFormatException;

class Factory {
    const HTML = 'HTML';
    const JSON = 'JSON';
    
    public function getInstance($type) {
        switch($type) {
            case self::HTML:
                return new HtmlFormatter();
                break;
            case self::JSON:
                return new JsonFormatter();
                break;
            default:
                throw new UnknownFormatException("Unknow format " . $type);
                break;
        }
    }
    
}