<?php

//require 'controller/post_controller.php';
//require 'model/select.php';

/*$post = new Post();

$post->setFields('564', 'pippo', 'pippo');

$res = $post->create();

echo '<br>';
echo '<br>';

echo "<pre>";
var_dump($res);
echo "<br>";
var_dump($post);
echo "</pre>";*/


/*$post2 = new Post();
$post2->setID(9);
$res = $post2->read();


echo "<pre>";
var_dump($res);
echo "<br>";
var_dump($post2);
echo "</pre>";*/

/*
$post2 = new Post();
$post2->setID(9);
$post2->setFields('pap', 'pionni', '');
$res = $post2->update();


echo "<pre>";
var_dump($res);
echo "<br>";
var_dump($post2);
echo "</pre>";
*/

/*$post2 = new Post();
$post2->setID(28);
$res = $post2->delete();


echo "<pre>";
var_dump($res);
echo "<br>";
var_dump($post2);
echo "</pre>";*/

//echo date("Y-m-d H:i:s");


/*$results = true;
$state = selectAll($results);


echo "<pre>";
var_dump($results);
var_dump($state);
echo "</pre>";
*/

/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

//include 'controller/all_post_controller.php';

/*echo $_SERVER['HTTPS'];
echo "<br>";
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo "<br>";
echo $_SERVER['REQUEST_URI'];
echo "<br>";
echo "<br>";
echo $_SERVER['DOCUMENT_ROOT'];
*/

/*require_once 'controller/admin_controller.php';

$user_name = 'zerocinque';
$pass = '83d97b71499bee6b9d42dee9d3a6e5d00ecc8c891346d25d1909b3aac9abaa0ad4864fe4eacf159cd3f4a0ad764178d014ac378dfffc5e4023f6dbcfb0992648';


$user = new Admin();
$user->setUserName($user_name);
$find = $user->find();
echo $find ? 'si' : 'no';
echo '<br>';
$cmp = $user->compare(new Admin($user_name, $pass));
echo $cmp ? 'si' : 'no';*/

/*require_once 'view/components/session.php';
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';*/


require_once 'controller/user_controller.php';

$user = new User('pluto', 'pluto@live.it', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe');

$state = $user->create();

echo $state;

echo '<pre>';
var_dump($user);
echo '</pre>';







