<?php

namespace App\Services;

use App\Http\Resources\AccountHeadHierarchicalResource;
use App\Http\Resources\AccountHeadTableResource;
use App\Models\AccountHead;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountHeadService
{
    public function getHeadsInHierarchicalView(Request $request): JsonResponse
    {
        $requestData = $this->formatRequestData($request);
        return withSuccess(AccountHead::whereNull('account_head_id')
            ->with([
                'child' => function (Builder $query) {
                    $query->withCount('child');
                },
                'child.child' => function (Builder $query) {
                    $query->withTotalAmount();
                },
            ])
            ->paginate($requestData['limit']));
        // $accountHeads = AccountHeadHierarchicalResource::collection(
        //     AccountHead::whereNull('account_head_id')
        //         ->with([
        //             'child' => function (Builder $query) {
        //                 $query->with('transactions');
        //             },
        //             'child.child' => function (Builder $query) {
        //                 $query->withTotalAmount();
        //             },
        //         ])
        //         ->paginate($requestData['limit'])
        // );
        // return withSuccessResourceList($accountHeads);
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
            'page' => $request->integer('page', 1)
        ];
    }
}
