<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $active;
    public function __construct($active)
    {
        //
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.menu', ['active' => $this->active]);
    }

    public function list(){
        return [
            ['label' => 'Dashboard'],
            ['label' => 'Movies'],
            ['label' => 'Theaters'],
            ['label' => 'Tickets'],
            ['label' => 'Users'],
        ];
    }

    public function listLink(){
        return [
            ['link' => 'dashboard'],
            ['link' => 'movies'],
            ['link' => 'theaters'],
            ['link' => 'tickets'],
            ['link' => 'users'],
        ];
    }

    public function isActive($label){
        return $label === $this->active;
    }
}