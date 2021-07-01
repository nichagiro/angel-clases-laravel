<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertPhones extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $status;
    public $bg;
    public $msg;

    public function __construct($status='')
    {
        $this->status = $status;

        if($this->status == 'destroy'){

            $this->bg = 'danger';
            $this->msg = 'Elemento Eliminado';

        }
        if($this->status == 'store'){

            $this->bg = 'success';
            $this->msg = 'Elemento Creado';

        }
        if($this->status == 'update'){

            $this->bg = 'warning';
            $this->msg = 'Elemento Actualizado';

        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert-phones');
    }
}
