<?php
class UtilsController
{
    function __construct()
    {
        $this->Pippo();
    }

    function Pippo()
    {
        echo json_encode(["pippo"]);
    }
}
