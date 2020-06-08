<?php

declare(strict_type=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        // ユーザーインスタンスを取得
        $user = Socialite::driver('twitter')->user();

        // その SNS で一意の ID
        $user->getId();

        // twitter でいうところの @xxxx
        $user->getNickname();

        // 名前
        $user->getName();

        // メールアドレス
        $user->getEmail();

        // アイコンやアバターの画像 URL
        $user->getAvatar();

        $user->accessTokenResponseBody;
        // => Array
        //(
        //    [oauth_token]        => xxxxx-xxxxx
        //    [oauth_token_secret] => xxxxxxxxxx
        //    [user_id]            => xxxxxxxxxx
        //    [screen_name]        => xxxxx
        //)
    }
}
