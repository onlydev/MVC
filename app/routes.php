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
SimpleRouter::error(static function (Request $request, Exception $exception) {
    if ($exception instanceof NotFoundHttpException &&
        $exception->getCode() === 404)
    {
        response()->redirect('/error/404');
    }
});

/**
 * 테스트
 */
SimpleRouter::get('/', static function (){
    return date('Y-m-d H:i:s');
});

SimpleRouter::get('/hello', static function (){
    return 'Hello World!';
});

/**
 * 콘트롤러 테스트
 */
SimpleRouter::group(['prefix' => '/test'], static function () {
    SimpleRouter::get('/', 'Test\TestController@index')->name('test');
    SimpleRouter::get('/index', 'Test\TestController@index')->name('test');
    SimpleRouter::get('/{id}/test', 'Test\TestController@anyTest')->name('test.test');
    // $url = url('test');
    // $url = url('test', ['id' => 1]);
});

// 없는 페이지를 호출 할 경우
SimpleRouter::group(['prefix'=>'/error'], static function () {
    SimpleRouter::get('/404', static function () {
        return '404 Page Not Found...';
    });
});

// Start the routing
SimpleRouter::start();
