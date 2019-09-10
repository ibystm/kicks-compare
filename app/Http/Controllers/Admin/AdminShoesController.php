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
        $disk = Storage::disk('s3');
        $shoe = new Shoe();
        $shoe->name = $request->name;
        $shoe->manufacturer_id = $request->manufacturer_id;
        $image_dir = $disk->put('kicks', $request->image_url, 'public');
        $shoe->image_url = $disk->url($image_dir);
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
        $disk = Storage::disk('s3');
        $shoe = $this->shoe->findOrFail($id);
        $shoe->name = $request->name;
        $shoe->manufacturer_id = $request->manufacturer_id;
        $image_dir = $disk->put('kicks', $request->image_url, 'public');
        if ( $shoe->image_url ) {
            $d = parse_url($shoe->image_url);
            dd($d);
            $disk->delete($shoe->image_url);
        }
        $shoe->image_url = $disk->url($image_dir);
        $shoe->description = $request->description;
        $shoe->save();
        return view('admin.detail', compact('shoe'));
    }

    public function delete($id)
    {
        $shoe = $this->shoe->find($id);
        $file = $shoe->image_url;
        $shoe->delete();
        $disk = Storage::disk('s3');
        $disk->delete($file);
        return redirect()->route('admin.top');
    }
}
