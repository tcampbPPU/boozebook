<?php

namespace App\Policies;

use App\Models\BartenderEvent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BartenderEventPolicy
{
    use HandlesAuthorization;
}
