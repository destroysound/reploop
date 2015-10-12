<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReploopApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $client = new \GuzzleHttp\Client();
       // Calculate offset based on 10 items per page.
       $offset = $request->input('page', 0) * 10;
       $res = $client->request('GET', 'http://test.localfeedbackloop.com/api?apiKey=61067f81f8cf7e4a1f673cd230216112&noOfReviews=10&internal=1&yelp=1&google=1&offset='.$offset.'&threshold=1', []); 
       $results = json_decode($res->getBody());
       $results['business_info']['total_rating']['no_of_pages'] =
           ceil($results['business_info']['total_rating']['no_of_reviews'] / 10)
       return response()->json($results);
    }

}
