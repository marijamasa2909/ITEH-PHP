<?php
class Products{
    private $name;
    private $about;
    private $price;
    private $url;
    public function __construct(string $name, string $about, int $price, int $url)
    {
        $this->name=$name;
        $this->about=$about;
        $this->price=$price;
        $this->url=$url;
    }

    function getName(){
        return $this->name;
    }
    function getAbout(){
        return $this->about;
    }
    function getPrice(){
        return $this->price;
    }
    function getUrl(){
        return $this->url;
    }
}
