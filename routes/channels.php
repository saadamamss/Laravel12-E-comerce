<?php

use Illuminate\Support\Facades\Broadcast;


// Broadcast::routes(['middleware' => ['web', 'auth:api']]);
// Broadcast::routes(['middleware' => ['web', 'auth:sanctum']]);


Broadcast::channel('user.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('App.Models.User.{id}', function () {
//     return true;
// });
// routes/channels.php
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});