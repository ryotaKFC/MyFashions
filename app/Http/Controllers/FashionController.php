<?php

namespace App\Http\Controllers;

use App\Models\Fashion;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FashionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fashions = Fashion::orderBy('created_at', 'desc')->paginate(9);
        $data = ['fashions' => $fashions];
        return view('fashions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fashion = new Fashion();
        $data = ['fashion' => $fashion];
        return view('fashions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'photo_path' => 'nullable|image|max:4096',
            'season' => 'required|max:20',
            'weather' => 'required|max:20',
            'temperature' => 'required|max:2',
            'humidity' => 'required|max:2',
        ]);
        $fashion = new Fashion();
        $fashion->user_id = auth()->id();
        $fashion->name = $request->name;
        $fashion->season = $request->season;
        $fashion->weather = $request->weather;
        $fashion->temperature = $request->temperature;
        $fashion->humidity = $request->humidity;

    if ($request->hasFile('photo_path')) {
        $file = $request->file('photo_path');

        // 拡張子をpngに固定（PNG変換する場合）
        $filename = (auth()->id() ?? 'guest') . '_' . time() . '.png';
        $path = 'private/img/' . $filename;

        // Intervention Image で PNGに変換して保存
        $image = Image::make($file)->encode('png');
        Storage::put($path, $image);

        $fashion->photo_path = $path;
    }
        
        
        
        $fashion->save();



        return redirect(route('fashions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fashion  $fashion
     * @return \Illuminate\Http\Response
     */
    public function show(Fashion $fashion)
    {
        $data = ['fashion' => $fashion];
        return view('fashions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fashion  $fashion
     * @return \Illuminate\Http\Response
     */
    public function edit(Fashion $fashion)
    {
        $this->authorize($fashion);
        $data = ['fashion' => $fashion];
        return view('fashions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fashion  $fashion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fashion $fashion)
    {
        $this->authorize($fashion);
        $this->validate($request, [
            'name' => 'required|max:20',
            'photo_path' => '',
            'season' => 'required|max:20',
            'weather' => 'required|max:20',
            'temperature' => 'required|max:2',
            'humidity' => 'required|max:2',

        ]);
        $fashion = new Fashion();
        $fashion->name = $request->name;
        $fashion->photo_path = $request->photo_path;
        $fashion->season = $request->season;
        $fashion->weather = $request->weather;
        $fashion->temperature = $request->temperature;
        $fashion->humidity = $request->humidity;
        $fashion->save();

        return redirect(route('fashions.show', $fashion));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fashion  $fashion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fashion $fashion)
    {
        $this->authorize($fashion);
        $fashion->delete();
        return redirect(route('fashions.index'));
    }

    public function bookmark_fashions(){
        $fashions = \Auth::user()->bookmark_fashions()->orderBy('created_at', 'desc')->paginate(9);
        $data = [
            'fashions' => $fashions,
        ];
        return view('fashions.bookmarks', $data);
    }
}
