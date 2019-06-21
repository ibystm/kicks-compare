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

    public function __construct(
        Comment $comment,
        Manufacture $manufacture,
        Shoe $shoe
    ){
        // $this->middleware('auth');
        $this->comment = $comment;
        $this->manufacture = $manufacture;
        $this->shoe = $shoe;
    }

    public function index(Request $request)
    {
        $manufacturer = $this->manufacture->all();
         if ($request->has('search'))
         {
            $inputs = $request['search'];
            $shoes = $this
                    ->shoe->searchFromWords($inputs)
                    ->get();

        } elseif ($request->has('manufacturer_id')) {
            $shoes = $this
                    ->shoe
                    ->searchFromManu($request['manufacturer_id'])
                    ->get();
        } else {
            $shoes = $this->shoe->all();
            $pickup = $this
                    ->shoe
                    ->orderby('created_at', 'desc')
                    ->first();
        }
        return view('index',
                compact(
                    'shoes',
                    'manufacturer',
                    'pickup',
                    'inputs'
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
        if ($request->has('user_id'))
        {
            $inputs = $request->all();
            $this->comment->create($inputs);
            return redirect()->back();
        } else {
            return redirect()->to('login');
        }
    }

}
