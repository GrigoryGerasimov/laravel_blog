<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\{Post, Category, Tag};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final class PostService
{
    public static function store(array $requestData): Post
    {
        try {
            DB::beginTransaction();

            $tags = self::pluckData($requestData, 'tags');
            $requestData['description'] = substr($requestData['content'], 0, 200);

            $post = self::createPost($requestData, $tags);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            exit(1);
        }

        return $post;
    }

    public static function store_api(array $requestData): Post
    {
        try {
            DB::beginTransaction();

            $tagsIds = self::getTagsIds(self::pluckData($requestData, 'tags'));
            $categoryId = self::getCategoryId(self::pluckData($requestData, 'category'));

            $requestData['description'] = substr($requestData['content'], 0, 200);
            $requestData['category_id'] = $categoryId;

            $post = self::createPost($requestData, $tagsIds);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            exit(1);
        }

        return $post;
    }

    public static function update(Post $post, array $requestData): Post|null
    {
        try {
            DB::beginTransaction();

            $tagsData = self::pluckData($requestData, 'tags');

            $post = self::updatePost($post, $requestData, $tagsData);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            exit(1);
        }

        return $post;
    }

    public static function update_api(Post $post, array $requestData): Post|null
    {
        try {
            DB::beginTransaction();

            $tagsIds = self::getTagsIds(self::pluckData($requestData, 'tags'));
            $categoryId = self::getCategoryId(self::pluckData($requestData, 'category'));

            $requestData['category_id'] = $categoryId;

            $post = self::updatePost($post, $requestData, $tagsIds);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
            exit(1);
        }

        return $post;
    }

    private static function pluckData(array &$data, string $key): mixed
    {
        $pluckedData = $data[$key];
        unset($data[$key]);

        return $pluckedData;
    }

    private static function createPost(array $postData, array $tagsData): Post
    {
        $newPost = Post::create($postData);
        $newPost->tags()->attach($tagsData);

        return $newPost;
    }

    private static function updatePost(Post $post, array $postData, array $tagsData): Post|null
    {
        $post->tags()->sync($tagsData);
        $post->update($postData);

        return $post->fresh();
    }

    private static function findOrCreate(string $modelClass, array $entity): Model
    {
        try {
            if (!(isset($entity['id']) && !is_null($result = $modelClass::find($entity['id'])))) {
                if (!isset($entity['title'])) {
                    throw new \Exception('Please provide a correct title for a new entity');
                }
                $result = $modelClass::create($entity);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        return $result;
    }

    private static function getCategoryId(array $category): string|int
    {
        if (empty($category)) throw new \Exception('No required category found');

        $category = self::findOrCreate(Category::class, $category);

        return $category->id;
    }

    private static function getTagsIds(array $tags): array
    {
        if (empty($tags)) throw new \Exception('No required tags found');

        $tagsIds = [];

        foreach ($tags as $tag) {
            $tag = self::findOrCreate(Tag::class, $tag);
            $tagsIds[] = $tag->id;
        }

        return $tagsIds;
    }
}
