<?php
namespace app\admin\controller;
use controller\BasicAdmin;
use think\Db;
use Exception;
use think\Request;

class Index extends BasicAdmin
{
    public function index()
    {
        return view('index');
    }
}
