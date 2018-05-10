<?php
namespace Magento;

use Exception;
use Magento\Util\Validation\ReportValidator;

class Report
{

    private $title;

    private $date;

    private $content;

    private $validator;

    public function __construct(ReportValidator $validator)
    {
        $this->validator = $validator;
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

    public function formatJson()
    {
        return json_encode($this->reportToArray());
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

    public function formatHtml()
    {
        return "
            <h1>{$this->title}</h1> .
            <p>{$this->date}</p> .
            <div class='content'>{$this->content}</div> .
        ";
    }

    public function sendReport($type)
    {
        if ($this->validator->validate($this)) {
            if ($type == 'HTML') {
                $mailer = new Mailer();
                $mailer->send($this->formatHtml());
                return true;
            }
            
            if ($type == 'JSON') {
                $mailer = new Mailer();
                $mailer->send($this->formatJson());
                return true;
            }
        }
        
        return false;
    }
}
