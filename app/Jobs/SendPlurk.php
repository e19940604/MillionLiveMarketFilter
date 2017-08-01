<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use MillionLiveMarketFilter\Services\PlurkApi;

class SendPlurk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $plurk_id;
    private $bazaarRecord;
    private $plurk;
    private $line;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $plurk_id , $bazaarRecord , $line )
    {
        $this->plurk_id = $plurk_id;
        $this->bazaarRecord = $bazaarRecord;
        $this->line = $line;
        $this->plurk = new PlurkApi();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $content = $this->bazaarRecord->name . " 在 " . $this->line . " 線，" . $this->bazaarRecord->cardPrice . "。網址：" . $this->bazaarRecord->url ;

        $payload = [
            "content" => rawurlencode( $content ),
            "qualifier" => 0,
            "limited_to" => urlencode("[" . $this->plurk_id . "]"),
            "no_comments" => 0,
            "lang" => "en",
            "replurkable" => 1
        ];
        $this->plurk->plurk("POST", "https://www.plurk.com/APP/Timeline/plurkAdd" , $payload );
    }
}
