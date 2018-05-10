<?php
namespace Magento\Util\Validation;

class ReportValidator
{
    public function validate($report)
    {
        if (empty($report->getTitle())) {
            return false;
        }
        
        if (empty($report->getDate())) {
            return false;
        }
        
        if (empty($report->getContent())) {
            return false;
        }
        
        return true;
    }
}

?>