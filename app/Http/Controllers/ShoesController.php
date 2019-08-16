<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Manufacture;
use App\Models\Shoe;
use App\Models\Like;

class ShoesController extends Controller
{
    protected $comment;
    protected $manufacuture;
    protected $shoe;
    protected $like;

    public function __construct(
        Comment $comment,
        Manufacture $manufacture,
        Shoe $shoe,
        Like $like
    ){
        $this->comment = $comment;
        $this->manufacture = $manufacture;
        $this->shoe = $shoe;
        $this->like = $like;
    }

    public function index(Request $request)
    {
        $manufacturer = $this->manufacture->all();
        if ($request->has('search')) {
            $inputs = $request['search'];
            $shoes = $this
                    ->shoe->searchFromWords($inputs)
                    ->paginate(12);

            return view('index',
                        compact(
                            'shoes',
                            'manufacturer',
                            'inputs'
                        ));
        } elseif ($request->has('manufacturer_id')) {
            $shoes = $this
                    ->shoe
                    ->searchFromManu($request['manufacturer_id'])
                    ->paginate(12);
            $pickup = null;
        } else {
            $shoes = $this->shoe->paginate(12);
            $pickup = $this
                    ->shoe
                    ->orderby('created_at', 'desc')
                    ->first();
        }
        return view('index',
                compact(
                    'shoes',
                    'manufacturer',
                    'pickup'
                ));
    }

    public function show($id)
    {
        $shoe = $this->shoe->find($id);
        $comments = $shoe->comments->all();
        $manufacturer = $this->manufacture->all();
        return view('show',
                compact(
                    'shoe',
                    'comments',
                    'manufacturer'
                ));
    }

    public function addComment(Request $request)
    {
        if ($request->has('user_id')) {
            $inputs = $request->all();
            $this->comment->create($inputs);
            return redirect()->back();
        } else {
            return redirect()->to('login');
        }
    }
}
