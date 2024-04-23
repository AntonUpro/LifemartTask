<?php


namespace app\controllers;

use yii\web\Controller;

abstract class AbstractApiController extends Controller
{
    protected function sendSuccessResponse(array $data): array
    {
        return [
            'success' => true,
            'data' => $data,
        ];
    }

    protected function sendErrorResponse(string $error): array
    {
        return [
            'success' => false,
            'message' => $error,
        ];
    }
}