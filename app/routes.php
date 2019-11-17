<?php
/**
 * 라우팅 라이브러리
 * https://github.com/skipperbent/simple-php-router
 */
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

// 기본 콘트롤러 경로 셋팅
SimpleRouter::setDefaultNamespace('\Onlydev\Controllers');

// 없는 페이지 접속 시 404 에러 페이지로 이동
SimpleRouter::error(function(Request $request, Exception $exception) {
    if($exception instanceof NotFoundHttpException && $exception->getCode() === 404) {
        response()->redirect('/not-found');
    }
});

/**
 * 테스트
 */
SimpleRouter::get('/', function(){
    return date('Y-m-d H:i:s');
});

SimpleRouter::get('/hello', function(){
    return 'Hello World!';
});

/**
 * 콘트롤러 테스트
 */
SimpleRouter::get('/test', 'TestController@index')->name('test');
SimpleRouter::get('/test/index', 'TestController@index')->name('test');
SimpleRouter::get('/test/{id}/test', 'TestController@anyTest')->name('test.test');
// $url = url('test');
// $url = url('test', ['id' => 1]);

/**
 * 실제 사용페이지
 */


// 없는 페이지를 호출 할 경우
SimpleRouter::get('/not-found', function(){
    return '404 Page Not Found...';
});

// Start the routing
SimpleRouter::start();