<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MillionLiveMarketFilter\Services\PlurkApi;

class updatePlurkFriends extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plurk:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update plurk friends for bot';

    private $plurk_id;
    private $plurk;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PlurkApi $plurkApi )
    {
        parent::__construct();
        $this->plurk_id = env("PLURK_ID" , "14192611" );
        $this->plurk = $plurkApi;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $payload = [
            'user_id' => $this->plurk_id,
            'offset' => 0,
            'limit' => 100,
            'minimal_data' => 'false'
        ];
        $result = $this->plurk->plurk( "POST" , "https://www.plurk.com/APP/FriendsFans/getFriendsByOffset" ,  $payload );

        dd( json_decode($result) );
        return ;
    }
}
