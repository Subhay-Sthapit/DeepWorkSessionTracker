<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\DeepWorkInterface;
use App\Models\DeepWorkSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeepWorkController extends Controller
{
    private $deepWorkRepository;

    public function __construct(DeepWorkInterface $deepWorkRepository)
    {
        $this->middleware('auth');
        $this->deepWorkRepository = $deepWorkRepository;
    }

    public function createDeepSession(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
            // mandatory values in the request are:
            /*
             * planned_start_time
             * planned_end_time
             * session_name
             ***** optional values in the request are:
             * notes
             */
            $data['user_id'] = Auth::user()->getAuthIdentifier();
            $data['status'] = "CREATED"; // todo: get from config file
            $deepWorkSession = $this->deepWorkRepository->createDeepWorkSession($data);
            if ($deepWorkSession){
                return redirect()->route('view.DeepWorkSession'); // todo redirect with success message
            }
            else{
                return back(); // todo: return with failure message
            }
        }
        return view('createDeepWorkSession');
    }

    public function viewDeepWorkSessions(){
        $deepSessions = DeepWorkSession::where('user_id','=',Auth::user()->getAuthIdentifier())->get();
        return view('viewDeepWorkSessions')->with(compact('deepSessions'));
    }

    public function startDeepWorkSession($id){
        $deepSession = $this->deepWorkRepository->findDeepWorkSessionWithId($id);
        $currentDateTime = Carbon::now()->toDateTimeString();
        $data['status'] = 'Started';
        $data['actual_start_time'] = $currentDateTime;
        $startedDeepSession = $this->deepWorkRepository->startDeepWorkSession($deepSession,$data);
        // todo: need to do error handling
        return $startedDeepSession;
    }
}
