<?php

namespace App\Http\Controllers;

use App\Services\AccountHeadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountHeadController extends Controller
{
    public function __construct(protected AccountHeadService $accountHeadService)
    {
    }

    public function inHierarchicalView(Request $request): JsonResponse
    {
        return $this->accountHeadService->getHeadsInHierarchicalView($request);
    }

    public function inTableView(Request $request): JsonResponse
    {
        return $this->accountHeadService->getHeadsInTableView($request);
    }
}
