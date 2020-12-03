<?php

namespace App\View\Components\Admin;
use App\View\BaseComponent;
use Illuminate\Support\Facades\Route;

class Sidebar extends BaseComponent
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return $this->coreAdminView('parts.sidebar');
    }

    public function navList()
    {

        if ($this->user->isAdmin()) {
            return [
                $this->navItem(route('admin.index'), 'ti-home', 'Главная'),
//                $this->navItem(route('order.index'), 'ti-email', 'Заявки'),
                $this->navItem(route('quiz.index'), 'ti-check-box', 'Тесты'),
                $this->navItem(route('competition.index'), 'ti-check-box', 'Байкау'),
                $this->navItem(route('subject.index'), 'ti-view-list-alt', 'Предметы'),
                $this->navItem(route('region.index'), 'ti-view-list-alt', 'Регионы'),
                $this->navItem(route('city.index'), 'ti-view-list-alt', 'Города'),
                $this->navItem(route('area.index'), 'ti-view-list-alt', 'Район'),
                $this->navItem(route('school.index'), 'ti-view-list-alt', 'Школа'),
            ];
        } else {
            return [
//                $this->navItem(route('welcome'), 'ti-arrow-left', 'Вебсайт')
            ];
        }
    }

    private function navItem($url, $icon, $name, $items = [])
    {
        return [
            'url' => $url,
            'icon' => $icon,
            'title' => $name,
            'items' => $items,
            'current' => request()->getUri() == $url
        ];
    }

    private function divider()
    {
        return [
            'divider' => true
        ];
    }
}
