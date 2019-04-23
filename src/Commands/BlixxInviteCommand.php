<?php

    namespace Blixx\Invite\Commands;

    use Blixx\Invite\Mail\InviteCreatedMail;
    use Blixx\Invite\Models\Invite;
    use Illuminate\Console\Command;

    class BlixxInviteCommand extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'blixx:invite {email} {name}';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Invite a user to the admin';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function handle()
        {

            $invite = new Invite();

            $invite->fill([

                'first_name'    =>  $this->argument('name'),
                'email'         =>  $this->argument('email'),

            ]);

            $invite
                ->setExpiration()
                ->setToken();

            $invite->save();


            \Mail::send(new InviteCreatedMail($invite));


        }
    }
