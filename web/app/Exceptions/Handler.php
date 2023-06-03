<?php

namespace App\Exceptions;

use App\Providers\Api\ResponseProvider;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;


class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Exception|Throwable $exception): Response|JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        if ($request->is('api/*')) {
            $response_service = new ResponseProvider();
            if ($exception instanceof ValidationException) {
                return $response_service->EXCEPTION(null, 'Ошибка валидации полей - ' . $exception->getMessage(), $exception->status);
            }
            if ($exception instanceof MethodNotAllowedHttpException) {
                return $response_service->EXCEPTION(null, 'Метод ' . $request->method() . ' не разрешён', $exception->getStatusCode());
            }
            if ($exception instanceof NotFoundHttpException) {
                return $response_service->EXCEPTION(null, 'Такой функционал не реализован', $exception->getStatusCode());
            }
            if ($exception instanceof ModelNotFoundException) {
                return $response_service->EXCEPTION(null, 'Не найдены данные в базу по вашему запросу ' . $exception->getModel(), 422);
            }
            if ($exception instanceof QueryException) {
                return $response_service->EXCEPTION(null, 'Ошибка в базе ' . $exception->getMessage(), 500);
            }
        }
        return parent::render($request, $exception);
    }

}

