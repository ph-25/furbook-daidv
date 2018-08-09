<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 8/2/2018
 * Time: 6:45 PM
 */
namespace Honda;

require 'xechung.php';
use xechung;

class xega extends xechung
{
    private $name = 'Honda';

    public function start()
    {
        parent::start();
        echo $this->name . ' khoi dong';
    }

    public function run()
    {
        echo $this->name . ' chay';
    }
}