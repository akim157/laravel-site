<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends SiteController
{
    //
    public function __construct()
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));
        $this->bar = 'left';
        $this->template = config('settings.theme').'.contacts';
    }

    public function index(Request $request)
    {
        if($request->isMethod('post'))
        {
            //отправка письма
        }
        $this->title = 'Контакт';
        $content = view(config('settings.theme').'.contact_content')->render();
        $this->vars['content'] = $content;

        $this->contentLeftBar = view(config('settings.theme').'.contact_bar')->render();

        return $this->renderOutput();
    }
}
