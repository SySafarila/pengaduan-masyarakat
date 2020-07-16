<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ComplaintsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.complaints.index');
    }

    public function process()
    {
        $complaints = Complaint::with('user')->where('status', 'on process')->paginate(10);
        // return $complaints;
        return view('pages.complaints.process', ['complaints' => $complaints]);
    }

    public function complete()
    {
        $complaints = Complaint::with('user')->where('status', 'complete')->paginate(10);
        // return $complaints;
        return view('pages.complaints.complete', ['complaints' => $complaints]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->level == 'public') {
            return view('pages.complaints.create');
        } else {
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->level == 'public') {
            $request->validate([
                'report' => 'required|min:10|string',
                'photo' => 'required|image|file|max:5000'
            ], [
                'photo.max' => 'Maximum size for Cover Image is 5MB.'
            ]);

            $photo = Str::random(10) . '.' . $request->photo->extension();
            Complaint::create([
                'report' => $request->report,
                'photo' => $photo,
                'user_id' => $request->user()->id,
                'status' => 'pending'
            ]);

            $request->file('photo')->storeAs('photos', $photo);

            return redirect()->route('complaints.index')->with('status-success', 'Your complaint sent !');
        } else {
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::with('user')->find($id);
        if (Auth::user()->level == $complaint->user->level or Auth::user()->level == 'officer' or Auth::user()->level == 'admin') {
            return view('pages.complaints.show', ['complaint' => $complaint]);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->level == 'public') {
            return abort(404);
        }
        $request->validate([
            'status' => 'required|in:on process'
        ]);
        $complaint = Complaint::find($id);
        $complaint->update([
            'status' => $request->status
        ]);

        return redirect()->route('complaints.index')->with('status-success', 'Complaint Updated !');
    }

    public function setToComplete(Request $request, $id)
    {
        if (Auth::user()->level == 'public') {
            return abort(404);
        }
        $request->validate([
            'status' => 'required|in:complete'
        ]);
        $complaint = Complaint::find($id);
        $complaint->update([
            'status' => $request->status
        ]);

        return redirect()->route('complaints.process')->with('status-success', 'Complaint Updated !');
    }

    public function addResponse(Request $request, $id)
    {
        $request->validate([
            'response' => 'required'
        ]);
        $complaint = Complaint::find($id);
        $response = $complaint->responses()->create([
            'response' => $request->response,
            'user_id' => $request->user()->id
        ]);
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
