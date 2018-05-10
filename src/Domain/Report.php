<?php
namespace Magento\Domain;

class Report {
    private $title;
    private $date;
    private $content;

    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function setDate($date = null)
    {
        if (!$date) {
            $this->date = (new \DateTime())->format('y-m-d h:i:s');
        } else {
            $this->date = $date;
        }
    }
    
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getDate() {
        return $this->date;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function toArray() {
        return [
            'title' => $this->title,
            'date' => $this->date,
            'content' => $this->content
        ];
    }
}