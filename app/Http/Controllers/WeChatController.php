<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('wechat.oauth')->except('index');
    }

    public function index(){
        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 index！";
        });

        return $app->server->serve();
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 overtrue！";
        });

        return $app->server->serve();
    }

}
