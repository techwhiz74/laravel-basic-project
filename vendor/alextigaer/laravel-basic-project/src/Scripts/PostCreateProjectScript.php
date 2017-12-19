<?php

namespace LaravelBasicProject\Scripts;

use Composer\Script\Event;

class PostCreateProjectScript
{

    public static function editEnv(Event $event){
        echo "\n\n";

        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        echo "\n\n".$vendorDir;

    }

}