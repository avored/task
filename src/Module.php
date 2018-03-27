<?php
namespace AvoRed\Task;

use Illuminate\Support\ServiceProvider;
use AvoRed\Framework\AdminMenu\Facade as AdminMenuFacade;
use AvoRed\Framework\AdminMenu\AdminMenu;

class Module extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();
        $this->registerAdminMenu();

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Registering AvoRed Task Resource
     * e.g. Route, View, Database  & Translation Path
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'avored-task');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Registering Admin Menu for AvoRed Task Module
     *
     *
     * @return void
     */
    protected function registerAdminMenu() {

        $systemMenu = AdminMenuFacade::get('system');
        $configurationMenu = new AdminMenu();
        $configurationMenu->key('task')
            ->label('Task')
            ->route('admin.task.index')
            ->icon('fas fa-tasks');
        $systemMenu->subMenu('task', $configurationMenu);
    }
}