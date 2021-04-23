<?php

use Illuminate\Contracts\Auth\Authenticatable;

function current_user(): ?Authenticatable
{
    return auth()->user();
}
