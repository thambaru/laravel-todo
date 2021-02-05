## About Laravel-Todo

This is a web system built for myself for to keep track of my professional work tasks, and display publicly (to the team) so, the task-assigners will know which days are already occupied of me. Making the code available as one of my portfolio items, and for anyone who wants to make their homework easier.

Feel free to contribute, report bugs, and/or improve it. That helps us all.

## Demo

View a live demo version on https://tasks.thambaru.com

## How to get it running

If you want to deploy as is, just clone it and it will run on a configured PHP server (cPanel etc.).

If you want to develop or clone with the required environment, Docker is here. Run `vendor/bin/sail up` for that.

For both, go ahead and configure as below:

## Configuration

As common with laravel, you have to duplicate (copy-paste & rename) `.env.example` to `.env` and set the nessasary valeus such as DB URLs, Application name etc.

1. Run `php migrate` to setup the database
1. Run `php artisan db:seed` to create a user.

## Usage

Only signed-in users can add/edit/delete tasks. Goto `/login` to sign-in.

Username is generated dynamically. You will have to check for the `users` table of the database to findout after seeding.
WHY? I didn't want to complicate it with password reset and stuff but make it fairly secure to make the code public. So, nothing to worry if no one knows your random username even the password is public below. Want to make it secure? Please contribute!

Password is: `l0gMe!n` (Remember it as Log-Me-In)

## License

This system is built using Laravel and is open-source under the [MIT license](https://opensource.org/licenses/MIT).
The Laravel framework is also licensed under the [MIT license](https://opensource.org/licenses/MIT).
