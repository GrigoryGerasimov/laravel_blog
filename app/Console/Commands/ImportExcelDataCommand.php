<?php

namespace App\Console\Commands;

use App\Imports\ExcelDataImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelDataCommand extends Command
{
    protected $signature = 'import:excel';
    protected $description = 'Import data from Excel upload';

    public function handle()
    {
        Excel::import(new ExcelDataImport(), public_path('dist/excel/table.xlsx'));

        dd('Excel import done');
    }
}
