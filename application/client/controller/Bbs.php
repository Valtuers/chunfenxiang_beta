<?php
namespace app\client\controller;
use think\Request;
use think\Controller;

class Bbs extends Controller
{
    
    public function index(){
        
        return $this -> fetch();
    }

    public function login(){
        return $this -> fetch();
    }

    public function staff(){
        return $this -> fetch();
    }

    public function stranger(){
        return $this -> fetch();
    }

    public function test(){
        return $this -> fetch();
    }

}
