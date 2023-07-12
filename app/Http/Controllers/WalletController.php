<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalletResource;
use App\Services\Wallet\WalletService;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    private WalletService $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    public function balance(Request $request): WalletResource
    {
        $balance = $this->walletService->get($request->phone);

        return new WalletResource([
            'balance' => $balance
        ]);
    }
}
