<?php

    namespace Blixx\Invite\Controllers;

    use App\Http\Controllers\Controller;
    use Blixx\Invite\Helpers\InviteService;
    use Blixx\Invite\Models\Invite;

    class InviteFollowController extends Controller
    {

        public function __invoke($invite, $token, InviteService $inviteService)
        {

            /**
             * @see InviteUseController next step after this function
             */

            $invite = Invite::find($invite);
            $inviteService->validateInvite($invite, $token);

            return view('blixx_invite::invite.follow', compact('invite'));



        }

    }