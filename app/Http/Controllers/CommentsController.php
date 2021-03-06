<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Comment;
use App\User;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\CommentReceived;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('forbidden-comment')->only('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (CreateCommentRequest $request, $team_id) {

        $request->validate(
            [
                'content' => 'required | min:10'
            ]
        );

        $team = Team::find($team_id);

        $comment = Comment::create([
            'content' => $request->get('content'),
            'team_id' => $team->id,
            'user_id' => Auth::user()->id,
        ]);

        if ($comment->team->user) {
            \Mail::to($comment->team->user)->send(new CommentReceived(
                $comment->team, $comment
            ));
        }

        return redirect(route('teams-show', [ 'id' => $teamId ]));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
