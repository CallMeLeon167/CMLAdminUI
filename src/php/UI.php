<?php

namespace CML_Admin;

class UI
{
    public function __construct(private \CML\Classes\Router $app)
    {
        echo "Admin UI Constructed!";
    }
}
