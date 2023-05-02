<?php

namespace App\Console\Commands;

use App\Http\Components\GuzzleClient;
use Illuminate\Console\Command;

final class ImportClientDataCommand extends Command
{
    protected $signature = 'import:data';
    protected $description = 'Import external client data';

    public function handle()
    {
        $import = new GuzzleClient();
        $data = $import->client->request('GET', 'posts');
        $details = [
            $data->getHeaders(),
            $data->getProtocolVersion(),
            $data->getStatusCode(),
            $data->getReasonPhrase(),
            $data->getBody()->getMetadata(),
            json_decode($data->getBody()->getContents())
        ];
        dd($details);
    }
}
