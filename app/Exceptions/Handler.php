<?php

namespace App\Exceptions;

use ErrorException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psy\Exception\FatalErrorException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
//        if ($exception instanceof NotFoundHttpException) {
//            if ($request->expectsJson()) {
//                return response()->json(['error' => 'Not Found'], 404);
//            }
//            return response()->view('errors/404', ['NotFound' => true], 404);
//        }
//        elseif ($exception instanceof  MethodNotAllowedHttpException){
//            if ($request->expectsJson()) {
//                return response()->json(['error' => 'Not Found'], 404);
//            }
//            return response()->view('errors/404', ['MethodNotAllowed' => true], 404);
//        }
//        elseif($exception instanceof ErrorException){
//            if ($request->expectsJson()) {
//                return response()->json(['error' => 'Not Found'], 404);
//            }
//            return response()->view('errors/404', ['NotFound' => true], 404);
//        }
//        elseif ($exception instanceof  ModelNotFoundException){
//            if ($request->expectsJson()) {
//                return response()->json(['error' => 'Not Found'], 404);
//            }
//            return response()->view('errors/404', ['ModelNotFound' => true], 404);
//        }
        return parent::render($request, $exception);
    }
}
