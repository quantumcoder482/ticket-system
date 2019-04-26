<?php
Class Request extends Symfony\Component\HttpFoundation\Request{

    public function input($key){
       return $this->get($key);
    }

}