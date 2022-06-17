<?php

namespace App\Policies;

use App\Models\Bartender;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BartenderPolicy
{
    use HandlesAuthorization;
}
