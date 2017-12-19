<?php

namespace LaravelBasicProject\Scripts;

use Composer\Script\Event;

class PostCreateProjectScript
{

    public static function editEnv(Event $event){
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        echo "\n\n";

        $slashPos = strpos($vendorDir, '/');
        $lastSlashPos = strripos($vendorDir, '\\');

        echo substr($vendorDir, $lastSlashPos + 1, $slashPos);

    }

}