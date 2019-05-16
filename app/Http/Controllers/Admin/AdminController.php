<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Menu;
use Auth;
use Gate;

class AdminController extends \Corp\Http\Controllers\Controller
{
    //
    protected $p_rep; //портфолио репозиторий
    protected $a_rep; //articles репозиторий
    protected $user; //объект пользователя
    protected $content = false; //объект контента
    protected $title;
    protected $vars; //массив переменных, который будет передоваться в шаблон
    protected $template; //шаблон

    public function __construct()
    {
        $this->user = Auth::user();
        if($this->user)
        {
            abort(403);
        }
    }

    public function renderOutput()
    {
        $this->vars['title'] = $this->title;
        $menu = $this->getMenu();
        $navigation = view(config('settings.theme').'.admin.navigation')->with('menu', $menu)->render();
        $this->vars['navigation'] = $navigation;
        if($this->content)
        {
            $this->vars['content'] = $this->content;
        }
        $footer = view(config('settings.theme').'.admin.footer')->render();
        $this->vars['footer'] = $footer;

        return view($this->template)->with($this->vars);
    }

    public function getMenu()
    {
        return Menu::make('adminMenu', function($menu){
            if(Gate::allows('VIEW_ADMIN_ARTICLES')) {
                $menu->add('Статьи', ['route' => 'articles.index']);
            }
            $menu->add('Портфолио', ['route' => 'articles.index']);
            $menu->add('Меню', ['route' => 'menus.index']);
            $menu->add('Пользователи', ['route' => 'users.index']);
            $menu->add('Привилегии', ['route' => 'permissions.index']);
            $menu->add('Выход', ['route' => 'logout']);
        });
    }
}
