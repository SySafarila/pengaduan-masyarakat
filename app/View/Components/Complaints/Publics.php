<?php

namespace App\View\Components\Complaints;

use App\Complaint;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Publics extends Component
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
        $user = Auth::user()->id;
        $complaints = Complaint::where('user_id', $user)->paginate(5);
        return view('components.complaints.publics', ['complaints' => $complaints]);
    }

    // public function complaints()
    // {
    //     $user = Auth::user()->id;
    //     $complaints = Complaint::where('user_id', $user)->get();
    //     return $complaints;
    // }
}
