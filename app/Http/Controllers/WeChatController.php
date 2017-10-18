<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('wechat.oauth')->except('serve');
    }

    public function index(){
        $id=session('wechat.oauth_user');
        return $id;
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
            return "https://test-wechat.oryxtc.xyz/index";
        });

        return $app->server->serve();
    }

}
