<?php 
class Message {
    private $id;
    private $sender;
    private $recipient;
    private $content;
    private $timestamp;
  
    public function __construct($id, $sender, $recipient, $content, $timestamp) {
      $this->id = $id;
      $this->sender = $sender;
      $this->recipient = $recipient;
      $this->content = $content;
      $this->timestamp = $timestamp;
    }
  }