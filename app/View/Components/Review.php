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

    public $review;

    public $image;

    public function __construct($username, $review, $image)
    {
        $this->username = $username;
        $this->review = $review;
        $this->image = $image;
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
