<?php

namespace App\Services;

use App\Actions\GiftCode\CreateAction;
use App\Actions\Redis\SubscribeAction;
use App\Enums\TransactionStatusEnum;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class GiftCodeService
{
    private CreateAction $createAction;
    private SubscribeAction $subscribeAction;

    public function __construct(CreateAction $createAction, SubscribeAction $subscribeAction)
    {
        $this->createAction = $createAction;
        $this->subscribeAction = $subscribeAction;
    }

    public function create(array $request): Collection
    {
        return $this->createAction->handle($request);
    }

    public function add(array $request)
    {
        $lotteryNumberWinners = $this->getNumberLotteryWinners($request);
        Cache::increment(env('GIFT_CODE_CACHE_KEY'));

        $data = [
            'phone' => $request['phone'],
            'code' => $request['code'],
            'status' => (++$lotteryNumberWinners > env('GIFT_CODE_NUMBER_WINNERS')) ?
                TransactionStatusEnum::FAILED->value : TransactionStatusEnum::SUCCESS->value,
        ];

        $caheKey = env('GIFT_CODE_USER_DATA_CACHE_KEY').'_'.$request['phone'];
        Cache::put($caheKey, json_encode($data), env('GIFT_CODE_KEY_EXPIRE_TIME'));
        Cache::flush();
        $this->subscribeAction->handle(env('GIFT_CODE_CHANNEL'), $data);
    }

    private function getNumberLotteryWinners(array $request): int
    {
        return Cache::remember(env('GIFT_CODE_CACHE_KEY'), env('GIFT_CODE_KEY_EXPIRE_TIME'), function () use ($request) {
            Cache::put(env('GIFT_CODE_CACHE_KEY'), 1, env('GIFT_CODE_KEY_EXPIRE_TIME'));

            return 1;
        });
    }
}
