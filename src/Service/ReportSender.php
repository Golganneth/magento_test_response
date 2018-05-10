<?php
namespace Magento\Service;

use Exception;

class ReportSender {
    private $validator;
    private $transportFactory;
    private $reportFormatterFactory;
    
    public function __construct($validator, $reportFormatterFactory, $transportFactory) {
        $this->validator = $validator;
        $this->reportFormatterFactory = $reportFormatterFactory;
        $this->transportFactory = $transportFactory;
    }
    
    public function sendReport($report, $type, $transportMethod) {
        $reportSent = false;
        
        if($this->validator->validate($report)) {
            try {
                /* Get the transport we want to send the report (only Mailer supported now) */
                $transport = $this->transportFactory->getInstance($transportMethod);

                /* Get the formatter to convert the report to a string */
                $formatter = $this->reportFormatterFactory->getInstance($type);
                
                /* Send the report */
                $reportSent = $transport->send($formatter->format($report));
            } catch (Exception $e) {
                
            }
        }
        return $reportSent;
    }
    
}