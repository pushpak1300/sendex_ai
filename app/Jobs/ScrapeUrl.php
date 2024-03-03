<?php

namespace App\Jobs;

use App\Models\Contact;
use Http;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScrapeUrl implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Contact $contact)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $urls = \Arr::get($this->contact?->data, 'urls', []);
        $combineResults = [];
        foreach ($urls as $url) {
            //Call the web scraper here
            $result = Http::post(config('app.python_app_url'). '/scrape'. '?url='. $url);
            $combineResults[] = $result->json()['response'][0];
        }
        $this->contact->update([
            'data->scrapedUrls' => [$combineResults],
        ]);
    }
}
