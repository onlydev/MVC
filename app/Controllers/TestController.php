<?php
namespace Onlydev\Controllers;

class TestController
{
    public function index()
    {
        return 'This is the default page and will respond to /controller and /controller/index';
    }
    
    /**
     * One required paramter and one optional parameter
     */
    public function anyTest($param, $param2 = 'default')
    {
        return 'This will respond to /controller/{param}/test/{param2}? with any method';
    }
    
    public function getTest()
    {
        return 'This will respond to /controller/test with only a GET method';
    }
    
    public function postTest()
    {
        return 'This will respond to /controller/test with only a POST method';
    }
    
    public function putTest()
    {
        return 'This will respond to /controller/test with only a PUT method';
    }
    
    public function deleteTest()
    {
        return 'This will respond to /controller/test with only a DELETE method';
    }
}