<?php
use App\Helpers\Mixi;
use App\Models\Role;

function gcuid()
{
    return auth()->user()->id;
}

function status($param = null, $context = null)
{
    $data = Mixi::status($context);
    return Mixi::propReturn($param, $data);
}

function role($param = null)
{
    $data = Role::all()->toArray();
    return Mixi::propReturn($param, $data);
}

function gender($param = null)
{
    $data = Mixi::gender();
    return Mixi::propReturn($param, $data);
}

function month($param = null)
{
    $data = Mixi::month();
    return Mixi::propReturn($param, $data);
}

function weekday($param = null)
{
    $data = Mixi::weekday();
    return Mixi::propReturn($param, $data);
}

