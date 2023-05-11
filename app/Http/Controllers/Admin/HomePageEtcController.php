<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageEtc;
use Illuminate\Http\Request;

class HomePageEtcController extends Controller
{
    public function SelectVideo(){
        $result = HomePageEtc::select('video_description','video_url')->get();
        return $result;
    } // end method

    public function SelectTotalHome(){
        $result = HomePageEtc::select('happy_client','complete_prjects','hour_of_support')->get();
        return $result;
    } // end method

    public function SelectTechHome(){
        $result = HomePageEtc::select('tech_description')->get();
        return $result;
    } // end method
    
    public function SelectHomeTitle(){
        $result = HomePageEtc::select('home_title','home_subtitle')->get();
        return $result;
    } // end method

}
