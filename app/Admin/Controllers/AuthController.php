<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AuthController as BaseAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseAuthController
{
    /**
     * 获取登录视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Redirect|\Illuminate\View\View
     */
    public function getLogin()
    {
        if (!Auth::guard('admin')->guest()) {
            return redirect(config('admin.route.prefix'));
        }
        return view('admin.login');
    }

    /**
     * 登录验证
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->only(['username', 'password', 'captcha']);
        $validator = Validator::make($credentials, [
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        unset($credentials['captcha']);
        if (Auth::guard('admin')->attempt($credentials)) {
            admin_toastr(trans('admin.login_successful'));
            return redirect()->intended(config('admin.route.prefix'));
        }
        return Redirect::back()->withInput()
            ->withErrors(['username' => $this->getFailedLoginMessage()]);
    }

    /**
     * 获取登录错误信息
     * @return array|\Illuminate\Contracts\Translation\Translator|string|\Symfony\Component\Translation\TranslatorInterface|null
     */
    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
            ? trans('auth.failed')
            : 'These credentials do not match our records.';
    }

}
