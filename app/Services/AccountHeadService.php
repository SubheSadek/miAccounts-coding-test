<?php

namespace App\Services;

use App\Models\AccountHead;
use Illuminate\Http\Request;

class AccountHeadService
{
    public function getHeadsInHierarchicalView(Request $request)
    {
        $requestData = $this->formatRequestData($request);
        $accountHeads = AccountHead::whereNull('account_head_id')
            ->with('child')
            ->paginate($requestData['limit']);
        return $accountHeads;
    }

    public function formatRequestData(Request $request)
    {
        return [
            'limit' => $request->integer('limit', 10),
            'page' => $request->integer('page', 1)
        ];
    }
}
