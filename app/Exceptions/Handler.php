<?php

namespace App\Exceptions;

use App\Core\Utils\RespUtil;
use App\Models\Enums\ErrorCode;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     * @param  \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson() || \Illuminate\Support\Facades\Request::is('api/*')) {
            return $this->handleApiException($request, $exception);
        } else {
            return $this->handleWebException($request, $exception);
        }
    }

    private function handleWebException($request, Throwable $exception)
    {
        if ($exception instanceof BaseException) {
            return $exception->getApiResponse();
        }
        return parent::render($request, $exception);
    }


    private function handleApiException($request, Throwable $exception)
    {
        $exception = $this->prepareException($exception);

        if ($exception instanceof BaseException) {
            return $exception->getApiResponse();
        }

        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            $exception = $this->convertValidationExceptionToResponse($exception, $request);
        }
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->wantsJson() || \Illuminate\Support\Facades\Request::is('api/*')) {
            return RespUtil::resp([
                'errors' => [
                    trans('auth.unauthorized')
                ],
                'errorCode' => ErrorCode::UNAUTHORIZED
            ], 401);
        } else {
//            return response()->view('modules.admin.core.errors.404', [], 404);
            return redirect()->route('login');
        }
    }


}
