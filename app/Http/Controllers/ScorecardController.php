<?php

namespace App\Http\Controllers;
// use Podio;
// use PodioItemFieldCollection;
// use PodioTextItemField;
// use PodioItem;
// use PodioTask;
// use PodioApp;
// use PodioContact;
use stdClass;
use Illuminate\Http\Request;
use App\Models\Scorecard;
use App\Models\User;

class ScorecardController extends Controller
{
    public function store_data(Request $request){
        // FOR PODIO ENVIRONMENT
        // $client_id = "scorecard-test";
        // $client_secret = "POZ5PvEUrtzGCNKpmfuWie9OjvHvD9JtRLE4M4iCe5lnYbKCycEElOvsww7XD2WX";
        // $app_id = "26231157";
        // $app_token = "157ee73516a671b24f9d0deef9bf2549";
        // Podio::setup($client_id, $client_secret);
        // Podio::authenticate_with_app($app_id, $app_token);
      
         
        // $item = PodioItem::create($app_id, array('fields' => array(
        //     'title' => $request->tasks[$i],
        //     'relationship' => 1540675739,
        //     'priority' => $request->priorities[$i],
        
        //     'date' => array("start" => date('Y-m-d', strtotime($request->duedates[$i])) ." 00:00:00", 
        //                         "end" => date('Y-m-d', strtotime($request->duedates[$i])) ." 00:00:00"
        //                     ),
        //     'techlevel' => (int) $request->techLevels[$i],
        //     'completion' => (int) $request->completions[$i],
        //     'estimatedhr' => (int) $request->estimatedHrs[$i],
        //     'actualtime' =>  (int) $request->actualHrs[$i],
        
        
        // )));
        
        // $item->save();
        $tasks = new stdClass();
        $tasks->title = $request->tasks;
        $tasks->priority = $request->priorities;
        $tasks->duedate = $request->duedates;
        $tasks->techlvl = $request->techLevels;
        $tasks->completion = $request->completions;
        $tasks->estimatedhr = $request->estimatedHrs;
        $tasks->actualtime = $request->actualHrs;
        $tasks->startBreaks = $request->allStartBreaks;
        $tasks->endBreaks = $request->allEndBreaks;
        $tasks->totalBreaks = $request->allTotalBreaks;
        $tasks->totalHrsBreak = $request->totalHrsBreak;
        $tasks->projects = $request->allProj;
        $tasks->projCount = $request->projCounter;

        $scorecard = new Scorecard;

        $scorecard->tasks = json_encode($tasks);
        $scorecard->receivers_email = $request->receiveremail;
        $scorecard->username = $request->fullname;

        $scorecard->save();

        // $count = array_key_last($request->tasks) + 1;
        // for($i = 0; $i < $count; $i++){

        // }


        return response()->json([
            "message" => "Saved"
        ]);
    }

    public function fetch_users(){
        $users = User::all();
        return $users;
    }

    public function view(Request $request){
        if($request->ajax()){
            $scorecard = Scorecard::find($request->id);
            return $scorecard;
        }
    }

    public function for_review(){
        $scorecards = Scorecard::where('needs_review', 1)->get();
        return view('reviews.index', compact('scorecards'));
    }

    public function send_review(Request $request){
        $reqDate = date('Y-m-d', strtotime($request->dateNeeded));
        // dd($reqDate);
        $scorecard = Scorecard::where('user_id', 1)->whereRaw('Date(created_at) = ?', [$reqDate])->first();
        // dd($scorecard);
        $scorecard->needs_review = 1;
        $scorecard->save();
        return 'Success';
    }

    public function fetch_prev_scorecard(Request $request){
        $scorecard = Scorecard::where('user_id', 1)->whereRaw('Date(created_at) = ?', [$request->yesterday])->first();
        return $scorecard->tasks;
    }
}
