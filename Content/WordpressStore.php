<?php

namespace Drewberry\Content;


class WordpressStore
{
    private static $content;

    public static function getPostBySlug($slug)
    {
        $id = url_to_postid($slug);

        $pageOrPost = get_post($id);

        return $pageOrPost;
    }

    public static function getCategoryBySlug($slug)
    {
        return get_category_by_slug($slug);
    }

    public static function getPostById($id)
    {
        $pageOrPost = get_post($id);

        return $pageOrPost;
    }
}