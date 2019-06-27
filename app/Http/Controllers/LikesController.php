<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Auth;

class LikesController extends Controller
{
    protected $like;

    public function __construct(Like $like)
    {
        $this->middleware('auth');
        $this->like = $like;
    }

    public function like($shoesId)
    {
        $userId = Auth::user()->id;
        $like = $this
                ->like
                ->where('shoes_id', $shoesId)
                ->where('user_id', $userId)
                ->first();

        if (empty($like)) {
            $this->like->create(
                array(
                    'user_id' => $userId,
                    'shoes_id' => $shoesId,
                )
            );
        } else {
            $like->delete();
        }
        return redirect()->back();
    }
}
