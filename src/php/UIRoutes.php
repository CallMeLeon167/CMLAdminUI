<?php

namespace CML_Admin;

class UIRoutes extends \CML\Classes\Router
{
    private string $sitePath;
    private string $cmlInstalled;
    private static string $adminPath = 'vendor/callmeleon167/cml-admin-ui/src/';
    private static string $adminTitle = 'CML Admin UI';

    public function __construct(private \CML\Classes\Router $app, $cmlInstalled)
    {
        $this->cmlInstalled = $cmlInstalled;
        $this->sitePath = dirname(__DIR__, 2) . '/src/site/';
        $this->main();
    }

    private function main()
    {
        $app = $this->app;

        if (!$this->cmlInstalled) {
            $this->installRoute();
            return;
        }

        $app->addRoute('GET', '/cml', function () use ($app) {
            $app->addFooter(' ');
            $app->addHeader(' ');
            $app->addStyle(self::$adminPath . 'assets/css/admin/admin.css', '', true);
            $app->addScript(self::$adminPath . 'assets/js/jquery/3.7.1-jquery.min.js', '', true);
            $app->addScript(self::$adminPath . 'assets/js/admin/admin.js', '', true);
            $app->setTitle(self::$adminTitle);
            $this->renderAdminSite('admin.php', ['src' => self::$adminPath]);
        });
    }

    private function installRoute()
    {
        $app = $this->app;

        if (isset($_POST['installCML'])) {
            $adminUser = $_POST['adminUser'];
            $adminPassword = $_POST['adminPassword'];

            $db = new \CML\Classes\DB();

            $db->sql2db("CREATE TABLE `cml_ui_settings` (
                `setting_id` int(11) NOT NULL AUTO_INCREMENT,
                `setting_name` varchar(255) NOT NULL,
                `setting_value` varchar(255) NOT NULL,
                PRIMARY KEY (`setting_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

            $db->sql2db("INSERT INTO `cml_ui_settings` (`setting_name`, `setting_value`) VALUES (`admin_username`, ?)", [$adminUser]);
            $db->sql2db("INSERT INTO `cml_ui_settings` (`setting_name`, `setting_value`) VALUES (`admin_password`, ?)", [$adminPassword]);
        }

        $app->addRoute('GET', '/cml', function () use ($app) {
            $app->addFooter(' ');
            $app->addHeader(' ');
            $app->addStyle(self::$adminPath . 'assets/css/admin/installation.css', '', true);
            $app->setTitle(self::$adminTitle . ' - Installation');
            $this->renderAdminSite('installation.php');
        });
    }

    private function renderAdminSite(string $fileName, array $variables = [])
    {
        echo $this->_processFile($this->sitePath . $fileName, $variables);
    }
}
