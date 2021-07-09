<?php

use App\Models\Opras;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('review-opras.{supervisor_id}', function ($user, int $supervisor_id) {
    return $user->id === $supervisor_id;
});

Broadcast::channel('opras-reviwed.{opras_id}', function ($user, $opras_id) {
    return $user->id === Opras::find($opras_id)->user_id;
});
