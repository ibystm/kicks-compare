<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Manufacture;
use App\Models\Shoe;

class ShoesController extends Controller
{
    protected $comment;
    protected $manufacuture;
    protected $shoe;

    public function __construct(Comment $comment, Manufacture $manufacture, Shoe $shoe)
    {
        $this->middleware('auth');
        $this->comment = $comment;
        $this->manufacture = $manufacture;
        $this->shoe = $shoe;
    }

    public function index(Request $request)
    {
        $manufacturer = $this->manufacture->all();

         if(empty($request['search']))
         {
            $shoes = $this->shoe->all();
        } else {
            $inputs = $request['search'];
            $shoes = $this->shoe->searchFromWords($inputs)->get();
        }
        return view('index', compact('shoes', 'manufacturer', 'inputs'));
    }
    public function show($id)
    {
        $shoe = $this->shoe->find($id);
        $comments = $shoe->comments->all();
        $manufacturer = $this->manufacture->all();
        return view('show', compact('shoe', 'comments', 'manufacturer'));
    }
    public function addComment(Request $request)
    {
        $inputs = $request->all();
        $this->comment->create($inputs);
        return redirect()->back();
    }

}
