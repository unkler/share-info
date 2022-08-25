<?php

namespace App\Http\UseCases;

use App\Models\Tag;

class TagUseCase {

    /**
     * 登録済みタグもしくは記事に紐づいたタグを取得
     *
     * @param object $article
     * @return object
     */
    public function getTags($article = null): object
    {
        if ($article === null) {
            $allTagNames = Tag::all()->map(function ($tag) {
                return ['text' => $tag->name];
            });

            return $allTagNames;
        }

        $tagName = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return $tagName;
    }
}