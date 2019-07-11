<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Validator;
use App\Admin;

class SecretCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:secret {email : email for authentication}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Secret Administrators';

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
        if (Admin::where('role_id', 1)->count() == 0) {
            $email = $this->argument('email');
            $name = $this->ask('Name');
            $password = $this->secret('Password');
            $password_confirmation = $this->secret('Confirm password');

            if ($this->confirm('Do you wish to continue?')) {
                $validator = Validator::make([
                    'email' => $email,
                    'name' => $name,
                    'password' => $password,
                    'password_confirmation' => $password_confirmation,
                ], [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
                if ($validator->fails()) {
                    $this->info('Secret administrator not created. See error messages below:');

                    foreach ($validator->errors()->all() as $error) {
                        $this->error($error);
                    }
                }
                else {
                    Admin::create([
                        'role_id' => 1,
                        'email' => $email,
                        'name' => $name,
                        'password' => $password,
                        // 'email_verified_at' => \Carbon\Carbon::now(),
                    ]);
                    $this->info('Secret administrator created successfully.');
                }
            }
        } else {
            $this->error('You already heve secret admin.');
        }
    }
}
