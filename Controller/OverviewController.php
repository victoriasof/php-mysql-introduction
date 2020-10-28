<?php

declare(strict_types=1);

require 'Model/connection.php';

class OverviewController
{
    public function render()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $view = 'view/overview.php';


        $connection = new Connection();

    }
}}

