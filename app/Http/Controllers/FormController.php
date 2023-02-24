<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class FormController extends Controller
{

	private $formItems = ["InputName", "InputMail", "InputZip","InputPrefecture","InputAddress","InputBuilding","InputGender","InputTel","InputMessage"];

	private $validator = [
		"InputName" =>       "required|string|max:50",
		"InputMail" =>      "required|string|max:255",
		"InputZip" =>        "required|string|min:7|max:7",
		"InputPrefecture" => "required|numeric|max:48",
		"InputAddress" =>    "required|string|max:255",
		"InputBuilding" =>   "nullable|string|max:255",
		"InputGender" =>     "required|numeric|max:2",
		"InputImage" =>      "nullable|string|max:255",
		"InputTel" =>        "required|numeric",
		"InputMessage" =>    "nullable|string",
	];

	public function index(Request $request)
	{
		//画像があれば渡す
		$image = $request->session()->get("upload_image");

		//フォーム入力画ページのviewを表示
		return view('form.index',["image" => $image]);
	}

	function post(Request $request){
		$input = $request->only($this->formItems);

		//バリデーション
		$validator = Validator::make($input, $this->validator);
		if($validator->fails()){
		return redirect()->action("App\Http\Controllers\FormController@index")
		->withInput()
		->withErrors($validator);
		}

		//画像をアップロード
		if($request->InputImage){
			$image = $request->InputImage->store('public');
			$image = str_replace('public/', 'storage/', $image);
			$request->session()->put("upload_image", $image);
		}

		//セッションに書き込む
		$request->session()->put("form_input", $input);

		return redirect()->action("App\Http\Controllers\FormController@confirm");
	}

	function confirm(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");
		$image = $request->session()->get("upload_image");
		
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("App\Http\Controllers\FormController@index");
		}
        
		return view("form.confirm",["input" => $input, "image" => $image]);
	}	

	function send(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");
		$image = $request->session()->get("upload_image");
		
    //戻るボタンが押された時
		if($request->has("back")){
			return redirect()->action("App\Http\Controllers\FormController@index")
				->withInput($input);
		}

		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("App\Http\Controllers\FormController@index");
		}

		\DB::table('entries')->insert([
			'name' 			=>	$input["InputName"],
			'email' 		=>	$input["InputMail"],
			'zip' 			=>	$input["InputZip"],
			'prefecture'=>	$input["InputPrefecture"],
			'address' 	=>	$input["InputAddress"],
			'building'	=>	$input["InputBuilding"],
			'gender' 		=>	$input["InputGender"],
			'image' 		=>	$image,
			'tel' 			=>	$input["InputTel"],
			'message' 	=>	$input["InputMessage"],
			'created_at' => now(),
			'updated_at' => now()
		]);

		//セッションを空にする
		$request->session()->forget("form_input");
		$request->session()->forget("upload_image");
		return redirect()->action("App\Http\Controllers\FormController@thanks");
	}

	function thanks(Request $request){
				//フォーム入力画ページのviewを表示
				return view('form.thanks');
	}
}