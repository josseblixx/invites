<?php

    namespace Blixx\Invite\Controllers;

    use App\Http\Controllers\Controller;
    use App\User;
    use Blixx\Invite\Helpers\InviteService;
    use Blixx\Invite\Models\Invite;
    use Blixx\Invite\Requests\InviteUseRequest;

    class InviteUseController extends Controller
    {

        public function __invoke($invite, $token, InviteUseRequest $request, InviteService $inviteService)
        {

            /**
             * @see InviteFollowController for the form controller
             */

            $invite = Invite::find($invite);
            $inviteService->validateInvite($invite, $token);


            $data = $request->all();

            $data['password'] = bcrypt($data['password']);

            $user = User::create(
                $data
            );

            \Auth::login($user);

            return \Redirect::to('/');

        }

    }