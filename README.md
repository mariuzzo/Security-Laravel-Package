Mariuzzo Security Package for Laravel 4
=======================================

Installation
------------

 1. Install the package.
 2. Register the service provider: `Mariuzzo\Security\SecurityServiceProvider`.
 3. Run the package migrations `php artisan migrate --bench="mariuzzo/security"`
 4. Run the package seeds `php artisan db:seed --class="SecurityPackageSeeder"`
 5. Optionally register the commands.
