<?php

namespace App\View\Components\complaints;

use App\Complaint;
use Illuminate\View\Component;

class officers extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $complaints = Complaint::with('user')->where('status', 'on process')->paginate(10);
        return view('components.complaints.officers', ['complaints' => $complaints]);
    }
}
