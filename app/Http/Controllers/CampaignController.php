<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignDetail;
use App\Models\Operator;
use App\Models\Publisher;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CampaignController extends Controller
{
    public function index()
    {

        $campaigns = Campaign::select()
            ->with('publisher', 'campaignDetail')
            ->get();
        return view('campaigns.index', compact('campaigns'));
    } 
    

    public function create()
    {
        $publishers = Publisher::select('id', 'name', 'short_name')->get();
        $operators = Operator::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();
        return view('campaigns.create', compact('publishers', 'operators', 'services'));
    }



    public function store(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'required',
            'publisher_id' => 'required',
            'operator_id' => 'required',
            'service_id' => 'required',
            'ratio' => 'required',
            'status' => 'required'
        ]);


        try {
            // store
            $campaign = new Campaign();
            $campaign->name = $request->name;
            $campaign->publisher_id = $request->publisher_id;
            $campaign->save();
            
            $findOperator = Operator::find($request->operator_id);
            $campaignDetail = new CampaignDetail();
            $campaignDetail->campaign_id = $campaign->id;
            $campaignDetail->operator_id = $request->operator_id;
            $campaignDetail->service_id = $request->service_id;
            $campaignDetail->ratio = $request->ratio;
            if($findOperator){
                $currentDomain = $_SERVER['SERVER_NAME'];
                $url = "http://" . $currentDomain . "/traffic/" . $campaign->id ."/". $request->service_id ."/". $findOperator->name .
                "/{clickedID?}/?a=1&b=1&c=1";
                $campaignDetail->url = $url;
            }
            $campaignDetail->status = $request->status;
            $campaignDetail->save();
            Session::flash('message', 'Successfully created a new campaign');
            return redirect()->route('campaign.index');
        } catch (\Throwable $th) {
            Session::flash('message', $th->getMessage());
            Session::flash('type', 'error');
            return redirect()->route('campaign.index');
        }
    }


    public function show($id)
    {

        $campaign = Campaign::select()
            ->where('id', $id)
            ->with('publisher', 'campaignDetail')
            ->first();
        return view('campaigns.show', compact('campaign'));
    }



    public function reportIndex()
    {
        return view('campaigns.report.index');
    }
}
