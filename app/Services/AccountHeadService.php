<?php

namespace App\Services;

use App\Http\Resources\AccountHeadHierarchicalResource;
use App\Http\Resources\AccountHeadTableResource;
use App\Models\AccountHead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountHeadService
{
    public function getHeadsInHierarchicalView(Request $request): JsonResponse
    {
        $requestData = $this->formatRequestData($request);
        $accountHeads = AccountHeadHierarchicalResource::collection(
            AccountHead::whereNull('account_head_id')
                ->with(['child.child.child'])
                ->paginate($requestData['limit'])
        );

        return withSuccessResourceList($accountHeads);
    }

    public function getHeadsInTableView(Request $request): JsonResponse
    {
        $requestData = $this->formatRequestData($request);
        $accountHeads = AccountHeadTableResource::collection(
            AccountHead::whereType('HEAD')
                ->with(['parent.parent'])
                ->withTotalAmount()
                ->paginate($requestData['limit'])
        );

        return withSuccessResourceList($accountHeads);
    }

    public function formatRequestData(Request $request): array
    {
        return [
            'limit' => $request->integer('limit', 10),
            'page' => $request->integer('page', 1),
        ];
    }

    public function getGroupTotal($head): int
    {
        $total = 0;

        $total += (int) $head->total;

        foreach ($head->child as $childItem) {
            $total += $this->getGroupTotal($childItem);
        }

        return $total;
    }
}
