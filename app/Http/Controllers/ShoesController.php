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
        $this->comment = $comment;
        $this->manufacture = $manufacture;
        $this->shoe = $shoe;
    }

    public function index()
    {
        $shoes = $this->shoe->all();
        $manufacturer = $this->manufacture->all();
        return view('index', compact('shoes', 'manufacturer'));
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
