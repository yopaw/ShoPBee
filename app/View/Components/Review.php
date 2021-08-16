<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Review extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $username;

    public $content;

    public $rating;

    public $date;

    public function __construct($username, $content, $rating, $date)
    {
        $this->username = $username;
        $this->content = $content;
        $this->rating = $rating;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.review');
    }
}
