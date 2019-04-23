<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Menu;

class SiteController extends Controller
{
    //
    protected $p_rep; //объект портфолио
    protected $s_rep; //объект слайдера
    protected $a_rep; //объект статей
    protected $m_rep; //объект меню

    protected $keywords; //ключевые слова
    protected $meta_desc; //описание
    protected $title; //заголовок

    protected $template; //имя шаблона
    protected $vars = []; //массив передаваемых данных в шаблон

    protected $contentRightBar = false; //состояние видимости правого sidebar
    protected $contentLeftBar = false; //состояние видимости левого sidebar

    protected $bar = 'no'; //состояние видимости sidebar

    public function __construct(MenusRepository $m_rep)
    {
        $this->m_rep = $m_rep;
    }

    protected function renderOutput()
    {
        $menu = $this->getMenu();

        $this->vars['navigation'] = view(env('THEME').'.navigation')->with('menu', $menu)->render();
        if($this->contentRightBar) {
            $rightBar = view(env('THEME').'.rightbar')->with('content_rightbar', $this->contentRightBar)->render();
            $this->vars['rightBar'] = $rightBar;
        }
        $this->vars['bar'] = $this->bar;

        $this->vars['keywords'] = $this->keywords;
        $this->vars['meta_desc'] = $this->meta_desc;
        $this->vars['title'] = $this->title;

        $this->vars['footer'] = view(env('THEME').'.footer')->render();
        return view($this->template)->with($this->vars);
    }

    public function getMenu()
        {
        $menu = $this->m_rep->get();

        $mBuilder = Menu::make('MyNav', function($m) use ($menu)
        {
            foreach($menu as $item)
            {
                if($item->parent_id == 0)
                {
                    $m->add($item->title, $item->path)->id($item->id);
                }
                else
                {
                    if($m->find($item->parent_id))
                    {
                        $m->find($item->parent_id)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });

        return $mBuilder;
    }
}
