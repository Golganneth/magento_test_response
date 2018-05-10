<?php
namespace Magento\Util\Transport;

use Magento\Util\Transport\Exception\UnknownTransportException;
use Magento\Mailer;

class Factory {
    const MAILER = 'Mailer';
    public function getInstance($type) {
        switch($type) {
            case self::MAILER:
                return new Mailer();
                break;
            default:
                throw new UnknownTransportException("Unknown transport method " . $type);
                break;
        }
    }
}