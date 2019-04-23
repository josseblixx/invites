<?php


    \Route::group(['middleware' => ['web']], function(){

        \Route::get('blixx/invite/follow/{invite}/{token}',  \Blixx\Invite\Controllers\InviteFollowController::class)->name('blixx_invite_follow');
        \Route::post('blixx/invite/use/{invite}/{token}',  \Blixx\Invite\Controllers\InviteUseController::class)->name('blixx_invite_use');

    });

