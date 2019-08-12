<?php
/*
 * Use this file to start all your content transformation, below you have a very raw fetch of posts, as a starting point for you
 */

require_once __DIR__ . "/WordpressStore.php";

use Drewberry\Content\WordpressStore;

class ContentGenerator
{
    const POSTS_PER_PAGE = 9;

    /*
     * This will match the route 
     * /wp-json/drewberry/v1/get-by-slug?slug=/news/this-is-a-test
     * Change the route below to something more suitable to your business
    */
    public static function init()
    {
        add_action(
            'rest_api_init',
            function () {
                register_rest_route(
                    'drewberry/v1',
                    'get-by-slug',
                    [
                        'methods' => 'GET',
                        'callback' => [ContentGenerator::class, 'getContentBySlugHandler'],
                        'args' => [
                            'slug' => [
                                'required' => false,
                            ],
                        ],
                    ]
                );
            }
        );
    }

    public static function getContentBySlugHandler(WP_REST_Request $request)
    {
        $slug = $request['slug'];
        $post = WordpressStore::getPostBySlug($slug);
        return new WP_REST_Response($post);    
    }


}
