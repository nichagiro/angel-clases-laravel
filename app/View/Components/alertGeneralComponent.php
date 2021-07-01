<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alertGeneralComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $bg;
    public $name;
    public $msg;
    public $status;
    
    public function __construct($status=false, $bg="", $name="", $msg="")
    {
        if($status){

            $this->bg = $bg;
            $this->name = $name;
            $this->msg = $msg;
            $this->status = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert-general-component');
    }
}
