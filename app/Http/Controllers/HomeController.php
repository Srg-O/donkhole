<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $entries = DB::table('entries')->orderBy('id', 'desc')->get();

        return view('admin.list',['entries' => $entries]);
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        $entry = DB::table('entries')->where('id', $id)->first();

        return view('admin.detail',['entry' => $entry]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $entry = DB::table('entries')->where('id', $id)->delete();

        return redirect()->action("App\Http\Controllers\HomeController@index");
    }
}
