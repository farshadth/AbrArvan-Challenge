<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiftCodeRequest;
use App\Http\Resources\GiftCodeResource;
use App\Services\GiftCodeService;

class GiftCodeController extends Controller
{
    private GiftCodeService $giftCodeService;

    public function __construct(GiftCodeService $giftCodeService)
    {
        $this->giftCodeService = $giftCodeService;
    }

    public function create(GiftCodeRequest $request): GiftCodeResource
    {
        $data = $this->giftCodeService->create($request->validated());

        return new GiftCodeResource($data);
    }
}
