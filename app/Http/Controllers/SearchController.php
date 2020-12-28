<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
class SearchController extends Controller
{
    public function __construct(Request $request)
    {
		$this->request=$request;
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!empty($keyword)){
        $url = "https://pixabay.com/api/?key=19688350-38873570e76327e3a60561f94&q='.$keyword.'&image_type=photo";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec ($ch);
                $err = curl_error($ch);  //if you need
                curl_close ($ch);
                $result = json_decode($response);
        }else{
            $result ='';
        }
               //echo'<pre>'; print_r($result);exit;
        return view('index',compact('result'));
    }
}
