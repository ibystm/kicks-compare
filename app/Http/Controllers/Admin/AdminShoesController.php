<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Manufacture;
use App\Models\Shoe;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;

class AdminShoesController extends Controller
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

            return view('admin.index',
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
        return view('admin.index',
                compact(
                    'shoes',
                    'manufacturer',
                    'pickup'
                ));
    }

    public function showCreateForm()
    {
        $manufacturer = $this->manufacture->all();

        return view('admin.create', compact('manufacturer'));
    }

    public function create(Request $request)
    {
        $shoe = new Shoe();
        $shoe->name = $request->name;
        $shoe->manufacturer_id = $request->manufacturer_id;
        $shoe->image_url = Storage::disk('public')
                            ->put($shoe->name.'.jpg', $request->image_url);

        $shoe->description = $request->description;
        $shoe->save();

        return redirect()->route('admin.show', [
            'id' => $shoe->id,
            ]);
    }

    public function show(Request $request, $id)
    {
        $shoe = $this->shoe->find($id);
        return view('admin.detail',compact('shoe'));
    }

    public function edit($id)
    {
        $manufacturer = $this->manufacture->all();
        $shoe = $this->shoe->find($id);
        return view('admin.edit', compact('shoe', 'manufacturer'));
    }

    public function update(Request $request, $id)
    {
        dd($id);
        $inputs = $request->all();
        $shoe = $this->shoe->findOrFail($id);

    }

    public function delete($id)
    {
        $shoe = $this->shoe->find($id);
        $shoe->delete();
        return redirect()->route('admin.top');
    }
}
