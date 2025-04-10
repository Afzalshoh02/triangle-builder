<?php

namespace App\Http\Controllers;

use App\Http\Requests\TriangleRequest;
use App\Services\TriangleService;

class TriangleController extends Controller
{
    private TriangleService $triangleService;

    public function __construct(TriangleService $triangleService)
    {
        $this->triangleService = $triangleService;
    }

    public function index(TriangleRequest $request)
    {
        $result = null;
        $error = null;

        if ($request->has('number')) {
            $number = (int)$request->input('number');
            $result = $this->triangleService->buildTriangle($number);

            if ($result === null) {
                $error = 'Невозможно построить треугольник из данного числа';
            }
        }

        return view('triangle', [
            'result' => $result,
            'error' => $error,
        ]);
    }
}
