<?php
namespace Onlydev\Controllers\Test;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Onlydev\Models\TestModel;

class TestController
{
    private $twig;
    
    public function __construct()
    {
        $templateDir = __DIR__.'/../../../templates/front';
        $this->twig = new Environment(new FilesystemLoader($templateDir));
    }
    
    public function index()
    {
        $text = 'This is the default page and will respond to /controller and /controller/index';
        
        $R = [
            'file' => 'layout.twig',
            'data' => [
                'template' => [
                    'layout' => 'base',
                    'page' => 'test/index.twig',
                    'pageTitle' => '테스트 페이지 인덱스'
                ],
                'data' => [
                    'text' => $text
                ]
            ]
        ];
        return $this->twig->render($R['file'], $R['data']);
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
        $data = ['id'=>1];
        $test = new TestModel();
        $result = $test->findId($data);
        
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
