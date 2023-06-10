<?php

namespace App\Http\Controllers;

use App\Services\AccountHeadService;
use Illuminate\Http\Request;

class AccountHeadController extends Controller
{
    public function __construct(protected AccountHeadService $accountHeadService)
    {
    }
    public function inHierarchicalView(Request $request)
    {
        return $this->accountHeadService->getHeadsInHierarchicalView($request);
    }
}
