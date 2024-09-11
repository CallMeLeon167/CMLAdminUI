<?php

namespace CML_Admin;

class UI
{
    private \CML\Classes\DB $db;

    protected bool $cmlInstalled = true;
    protected UIRoutes $UIRoutes;

    public string $version = "v1.0";

    public function __construct(private \CML\Classes\Router $app)
    {
        $this->checkUiInstallation();
        $this->UIRoutes = new UIRoutes($app, $this->cmlInstalled);
    }

    private function checkUiInstallation()
    {
        try {
            $this->db = new \CML\Classes\DB();
        } catch (\Exception $e) {
            trigger_error("Database connection failed: " . $e->getMessage(), E_USER_ERROR);
        }

        try {
            $this->db->sql2array("SELECT * FROM `cml_ui_settings`");
        } catch (\Exception $e) {
            $this->cmlInstalled = false;
        }
    }
}
