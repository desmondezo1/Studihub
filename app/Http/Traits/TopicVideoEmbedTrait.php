<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 3/4/2019
 * Time: 20:08
 */

namespace Studihub\Http\Traits;


use Merujan99\LaravelVideoEmbed\Facades\LaravelVideoEmbed;

trait TopicVideoEmbedTrait
{

    public function checkEmbedLink($url){
        $whitelist = ['YouTube', 'Vimeo'];
      //Optional parameters to be appended to embed
        $params = [
            'autoplay' => 1,
            'loop' => 1
        ];

        //Optional attributes for embed container
        $attributes = [
            'type' => null,
            'class' => 'iframe-class',
            'data-html5-parameter' => true
        ];
        return LaravelVideoEmbed::parse($url, $whitelist, $params, $attributes);
    }
}