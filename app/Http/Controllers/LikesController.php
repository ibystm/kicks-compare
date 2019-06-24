<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        if (empty($like))
        {
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

    // public function dislike($shoesId, $userId)
    // {
    //     // 靴のidを取得
    //     $shoe = $this->like->findOrFail($shoesId);
    //     // 取得した靴のidでuser_idが現在ログイン済みの人であれば削除
    //     $shoe->liked_by()->findOrFail($userId)->delete();

    // }

}
