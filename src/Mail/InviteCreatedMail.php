<?php

    namespace Blixx\Invite\Mail;

    use Blixx\Invite\Models\Invite;
    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Contracts\Queue\ShouldQueue;

    class InviteCreatedMail extends Mailable
    {

        use Queueable, SerializesModels;

        /**
         * @var Invite
         */
        private $invite;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct(Invite $invite)
        {
            $this->invite = $invite;
        }

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {




            return $this
                ->to($this->invite->email)
                ->subject('Uitnodiging om gebruiker te worden')
                ->markdown('blixx_invite::emails.invites.created', ['invite'=>$this->invite]);


        }
    }
