<?php
namespace Magento;

use Exception;
use Magento\Util\Validation\ReportValidator;
use Magento\Util\Formatter\Report\Factory as FormatterReportFactory; 
use Magento\Util\Formatter\Exception\UnknownFormatException;

class Report {
    private $title;
    private $date;
    private $content;

    private $validator;
    private $formatterFactory;
    
    public function __construct(ReportValidator $validator = null, $formatterFactory = null) {
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
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDate($date = null)
    {
        if (! $date) {
            $this->date = (new \DateTime())->format('y-m-d h:i:s');
        } else {
            $this->date = $date;
        }
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'date' => $this->date,
            'content' => $this->content
        ];
    }

    public function reportToArray()
    {
        return $this->toArray();
    }

    public function sendReport($type)
    {
        $reportSent = false;
        if ($this->validator->validate($this)) {
            $formatter = $this->formatterFactory->getInstance($type);
            $mailer = new Mailer();
            $reportSent = $mailer->send($formatter->format($this));
        }
        
        return $reportSent;
    }
}
