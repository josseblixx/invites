<?php

    namespace Blixx\Invite\Helpers;

    use Blixx\Invite\Mail\InviteCreatedMail;
    use Blixx\Invite\Models\Invite;

    class InviteService
    {

        /**
         * @param Invite $invite
         * @param $token
         * @param bool $check_usage Check if the invite was used before (default true)
         * @param bool $check_expirity Check if the invite has expired (default true)
         * @param bool $check_token Check if the token is valid for this invite (default true)
         * @param bool $abort_on_error Abort if any of the checks fails (404 exception, default true)
         * @return bool
         */
        public function validateInvite(Invite $invite, $token, $check_usage = true, $check_expirity = true, $check_token = true, $abort_on_error = true)
        {

            $ok = false;

            if ($invite->exists) {

                $ok = true;

                if ($check_token) { $ok = $ok && $this->validateInviteToken($invite, $token); }
                if ($check_expirity) { $ok = $ok && $this->validateInviteUsage($invite); }
                if ($check_usage) { $ok = $ok && $this->validateInviteExpirity($invite); }

            }

            if ($abort_on_error && !$ok){
                abort(404);
            }

            return $ok;

        }

        /**
         * Checks Invite's token with $token and returns true if they match
         * and false if they don't
         *
         * @param Invite $invite
         * @param $token
         * @return bool
         */
        public function validateInviteToken(Invite $invite, $token)
        {
            return $invite->checkToken($token);
        }

        /**
         * Checks Invite's usage and returns false if the invite was used before
         * or true if not.
         *
         * @param Invite $invite
         * @return bool
         */
        public function validateInviteUsage(Invite $invite)
        {
            return !$invite->is_expired;
        }

        /**
         * Checks Invite's expirity and returns false if the invite has expired
         * or true if it hasn't.
         *
         * @param Invite $invite
         * @return bool
         */
        public function validateInviteExpirity(Invite $invite)
        {
            return !$invite->is_used;
        }


        public function createInvite($data)
        {

            $invite = new Invite();

            $invite
                ->fill($data)
                ->setExpiration()
                ->setToken();

            $invite->save();

            \Mail::send(new InviteCreatedMail($invite));

            return $invite;

        }


    }