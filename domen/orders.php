<?php
class Orders{
    private $user;
    private $product;
    private $date;
    public function __construct(string $user, string $product, int $date)
    {
        $this->user=$user;
        $this->product=$product;
        $this->date=$date;
    }
    function getUser(){
        return $this->user;
    }
    function getProduct(){
        return $this->about;
    }
    function getDate(){
        return $this->date;
    }
}