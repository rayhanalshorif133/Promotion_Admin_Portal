<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\CampaignDetail;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    public function __construct()
     {
         $this->run();
     }

    public function run()
    {
        $campaign = Campaign::create([
            'publisher_id' => 1,
            'name' => 'Campaign 1',
        ]);

        CampaignDetail::create([
            'campaign_id' => $campaign->id,
            'operator_id' => 1,
            'service_id' => 1,
            'ratio' => 0.4,
            'url' => 'http://localhost:3000/traffic/1/1/GP/{clickedID}/',
            'status' => 'active',
        ]);

    }
}
