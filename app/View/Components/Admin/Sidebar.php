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
                $this->navItem(route('quiz.index'), 'ti-check-box', 'Тесты'),
                $this->navItem(route('subject.index'), 'ti-view-list-alt', 'Предметы'),
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
