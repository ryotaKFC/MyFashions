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
    public function index(Request $request)
    {
        $sort = $request->query("sort", 'created_at');
        $direction = $request->query('direction', 'desc');

        $filter = $request->query('filter','');
        $filter_value = $request->query('filter_value', '');

        // ソート可能なカラムを制限
        $allowedSorts = ['created_at', 'season','weather','temperature','humidity'];
        $allowedDirections = ['asc', 'desc'];
        if (!in_array($sort, $allowedSorts)) $sort = 'created_at';
        if (!in_array($direction, $allowedDirections)) $direction = 'desc';
        
        // $fashions = Fashion::orderBy($sort, $direction)->paginate(10);

        // $data = ['fashions' => $fashions];
        // return view('fashions.index', $data);

        $query = Fashion::query();
        if ($filter && $filter_value) {
            $query->where($filter, $filter_value);
        }
        $fashions = $query->orderBy($sort, $direction)->paginate(10);

        // return view('fashions.index', compact('fashions', 'sort', 'direction'));
        return view('fashions.index', [
            'fashions' => $fashions,
            'sort' => $sort,
            'direction' => $direction,
            'filter' => $filter,
            'filter_value' => $filter_value,
        ]);
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
            // 'photo_path' => 'required',
            'season' => 'required|max:20',
            'weather' => 'required|max:20',
            'temperature' => 'required|max:2',
            'humidity' => 'required|max:2',
            'comment' => 'max:20',
        ]);
        $fashion = new Fashion();
        $fashion->user_id = auth()->id();
        // $fashion->name = $request->name;
        $fashion->season = $request->season;
        $fashion->weather = $request->weather;
        $fashion->temperature = $request->temperature;
        $fashion->humidity = $request->humidity;
        $fashion->luck = $this->get_random_luck();
        // コメント処理
        if($request->comment != '')
        $fashion->comment = $request->comment;
        else
        $fashion->comment = $this->get_random_comment();
        
        // 画像処理
        // name属性が'photo'のinputタグをファイル形式に、画像をpublic/avatarに保存
        $image_path = $request->file('photo')->store('public/avatar/');
        // 上記処理にて保存した画像に名前を付け、userテーブルのthumbnailカラムに、格納
        $fashion->photo_path = basename($image_path);
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
        return view('fashions.show', data: $data);
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
            // 'photo_path' => '',
            'season' => 'required|max:20',
            'weather' => 'required|max:20',
            'temperature' => 'required|max:2',
            'humidity' => 'required|max:2',
            'comment' => 'max:20',

        ]);
        $fashion = new Fashion();
        $fashion->photo_path = $request->photo_path;
        $fashion->season = $request->season;
        $fashion->weather = $request->weather;
        $fashion->temperature = $request->temperature;
        $fashion->humidity = $request->humidity;
        // コメント処理
        if($request->comment != '')
        $fashion->comment = $request->comment;
        else
        $fashion->comment = $this->get_random_comment();
        //　画像処理
        $image_path = $request->file('photo')->store('public/avatar/');
        $fashion->photo_path = basename($image_path);
        
        $fashion->save();

        return redirect(to: route('fashions.show', $fashion));
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

    public function calendar_event_fetch(Request $request)
    {
        $userId = \Auth::id();

        $fashions = Fashion::where('user_id', $userId)->get();

        // FullCalendar形式に変換
        $events = $fashions->map(function ($fashion) {
            return [
                'id' => $fashion->id,
                'title' => '',
                'start' => $fashion->created_at->toDateString(), 
                'image_url' => asset('storage/avatar/' . $fashion->photo_path),
                'url' => route('fashions.show', $fashion),
            ];
        });

        return response()->json($events);
    }


    public function get_random_luck(){
        $luck_comment = [
            '大吉',
            'スーパー吉',
            '超吉',
            '神吉',
            'Nice吉',
        ];
        return $luck_comment[rand(0, count($luck_comment) - 1)];
    }
    public function get_random_comment(){
        $comment = [
            '服好きと繋がりたい',
            'テスト',
        ];
        return $comment[rand(0, count($comment) - 1)];
    }
}
