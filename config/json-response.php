<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Faridibin\LaravelJsonResponse\JsonResponse;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

return [
    'exceptions' => [
        /**
         * Unauthenticated
         */
        AuthenticationException::class => [
            'error' => 'Unauthenticated',
            'setStatusCode' => Response::HTTP_UNAUTHORIZED
        ],

        /**
         * Unauthenticated
         */
        AccessDeniedHttpException::class => [
            'error' => 'This action is unauthorized.',
            'setStatusCode' => Response::HTTP_UNAUTHORIZED
        ],

        /**
         * Show model not found when receiving this error
         */
        ModelNotFoundException::class => [
            'error' => 'Model not found',
            'setStatusCode' => Response::HTTP_NOT_FOUND
        ],

        /**
         * Add all the errors from the validation and continue
         */
        ValidationException::class => function (ValidationException $e, JsonResponse $json) {
            $json
                ->mergeErrors($e->errors())
                ->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    ]
];
