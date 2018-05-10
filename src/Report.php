<?php
namespace Magento;

use Magento\Util\Validation\ReportValidator;
use Magento\Util\Formatter\Report\Factory as FormatterReportFactory; 
use Magento\Domain\Report as DomainReport;
use Magento\Service\ReportSender;
use Magento\Util\Formatter\FormatterInterface;
use Magento\Util\Transport\Factory as TransportFactory;

class Report extends DomainReport {
    private $validator;
    private $formatterFactory;
    private $transportFactory;
    
    public function __construct(
           ReportValidator $validator = null, 
           FormatterInterface $formatterFactory = null,
           TransportFactory $transportFactory = null ) {
        if (!empty($validator)) {
            $this->validator = $validator;
        } else {
            $this->validator = new ReportValidator();
        }
        
        if(!empty($formatterFactory)) {
            $this->formatterFactory = $formatterFactory;
        } else {
            $this->formatterFactory = new FormatterReportFactory();
        }
        
        if(!empty($transportFactory)) {
            $this->transportFactory = $transportFactory;
        } else {
            $this->transportFactory = new TransportFactory();
        }
    }
     
    public function reportToArray() {
        return $this->toArray();
    }

    public function sendReport($type) {
        $sendService = new ReportSender(
            $this->validator,
            $this->formatterFactory,
            $this->transportFactory
        );
        return $sendService->sendReport($this, $type, TransportFactory::MAILER);
    }
}
