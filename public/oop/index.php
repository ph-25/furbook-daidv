<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 8/2/2018
 * Time: 6:44 PM
 */

require 'honda\xega.php';
require 'yamaha\xega.php';

use Honda\Xega as Honda;
use Yamaha\Xega as Yamaha;

$honda = new Honda();
$honda->start();

echo '<br>';

$yamaha = new Yamaha();
$yamaha->start();

echo '<br>';

$title = 'This is function';
$getName = function () use ($title) {
    echo $title . ' get name';
};

$getName();


