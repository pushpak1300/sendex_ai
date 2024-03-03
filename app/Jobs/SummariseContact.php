<?php

namespace App\Jobs;

use App\Models\Contact;
use Arr;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SummariseContact implements ShouldQueue
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
        $scrapedUrls = Arr::get($this->contact?->data, 'scrapedUrls', []);
        $combinedContent = [];
        foreach ($scrapedUrls[0] as $url) {
            $content = $url['page_content'];
            array_push($combinedContent, $content);
        }
        $result = Http::post(config('app.python_app_url'). '/groq/summarise',[
            "data" => implode(',' ,$combinedContent),
            "company_type" => $this->contact?->type,
        ]);
        $this->contact->update([
            'data->summary' => $result->json()['response']
        ]);
    }
}
