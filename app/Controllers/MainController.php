<?php
namespace Onlydev\Controllers;

class MainController
{
    private $db;
    private $requestMethod;
    private $data;
    
    //    public function __construct($db, $requestMethod, $data)
    //    {
    //        $this->db = $db;
    //        $this->requestMethod = $requestMethod;
    //        $this->data = $data;
    //    }
    //
    //    public function process()
    //    {
    //        switch ($this->requestMethod) {
    //            case 'GET':
    //                $response = $this->notFoundMethod();
    //                break;
    //            case 'POST':
    //                $response = $this->insertData($this->data);
    //                break;
    //            default:
    //                $response = $this->notFoundMethod();
    //                break;
    //        }
    //
    //        header($response['status_code_header']);
    //        if($response['body']) {
    //            echo $response['body'];
    //        }
    //    }
    
    public function index()
    {
        return '메인페이지 입니다.';
    }
    
    public function insertData($year, $week)
    {
        if (!is_numeric($year) || !is_numeric($week)) {
            return '에러';
        }
        
        return '입력 성공';
    }
}