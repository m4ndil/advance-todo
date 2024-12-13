<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
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

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Throwable $exception)
    {
        // Check if the request is an API request
        if ($request->is('api/*')) {
            // Handle validation exceptions
            if ($exception instanceof ValidationException) {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => $exception->errors()
                ], 422);
            }

            // Handle HTTP exceptions (e.g., 404 Not Found, 403 Forbidden)
            if ($exception instanceof HttpException) {
                $statusCode = $exception->getStatusCode();
                $message = $exception->getMessage() ?: 'An error occurred.';

                return response()->json([
                    'message' => $message,
                ], $statusCode);
            }

            // Handle general exceptions
            return response()->json([
                'message' => 'An internal server error occurred.',
                'error' => $exception->getMessage()
            ], $exception instanceof HttpException ? $exception->getStatusCode() : 500);
        }

        // For non-API requests, use the default handling
        return parent::render($request, $exception);
    }
}