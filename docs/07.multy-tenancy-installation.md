# Install like normal with extra below steps
1. Update `Modules/Core/Config/config.php`
    `saas_enable` => true
2. Update `config/auth.php`
    `providers.users.model` => Modules\Core\Entities\Tenants\User::class
3. Update `config/medialibrary.php`
    `media_model` => Modules\Core\Entities\Tenants\Media::class
4. Update `config/webserver.php`
    `apache2.paths.actions` => all related commands
5. Update `modules_statuses.json`
    `SaasFront` => true
