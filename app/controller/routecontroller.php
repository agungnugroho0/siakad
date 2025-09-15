<?php
namespace app\controller;

class routecontroller
{
    public function biodata()
    {
        include __DIR__ . '/../view/biodata.php';
    }
    public function keluarga()
    {
        include __DIR__ . '/../view/keluarga.php';
    }
    public function pendidikan()
    {
        include __DIR__ . '/../view/pendidikan.php';
    }
}