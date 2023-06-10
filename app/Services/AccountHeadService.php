<?php

namespace App\Services;

use App\Http\Resources\AccountHeadHierarchicalResource;
use App\Models\AccountHead;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class AccountHeadService
{
    public function getHeadsInHierarchicalView(Request $request)
    {
        $requestData = $this->formatRequestData($request);
        $accountHeads = AccountHead::whereNull('account_head_id')
            ->with(['child.child'])
            ->withTotalAmount()
            ->paginate($requestData['limit']);
        // return $accountHeads;
        return AccountHeadHierarchicalResource::collection($accountHeads);
    }

    public function formatRequestData(Request $request)
    {
        return [
            'limit' => $request->integer('limit', 10),
            'page' => $request->integer('page', 1)
        ];
    }
}
