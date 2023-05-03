<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToCollection, WithHeadingRow};

class ExcelDataImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        foreach($collection as $collectionItem) {
            Post::firstOrCreate([
                'title' => $collectionItem['title']
            ], [
                'title' => $collectionItem['title'],
                'author' => $collectionItem['author'],
                'image' => $collectionItem['image'],
                'content' => $collectionItem['content'],
                'category_id' => $collectionItem['category']
            ]);
        }
    }
}
