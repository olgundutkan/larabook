<?php

$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('list all users who are registered for Larabook');


$I->haveAnAccount(['username' => 'Foo', 'email' => 'foo@example.com', 'password' => 'secret']);
$I->haveAnAccount(['username' => 'Bar', 'email' => 'bar@example.com', 'password' => 'secret']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');
