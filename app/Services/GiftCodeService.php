<?php

namespace App\Services;

use App\Actions\GiftCode\CreateAction;
use Illuminate\Support\Collection;

class GiftCodeService
{
    private CreateAction $createAction;

    public function __construct(CreateAction $createAction)
    {
        $this->createAction = $createAction;
    }

    public function create(array $request): Collection
    {
        return $this->createAction->handle($request);
    }
}
