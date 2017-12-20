<?php

namespace LaravelBasicProject\Scripts;

use Composer\Script\Event;

class PostCreateProjectScript
{

    public static function editEnv(Event $event){
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        $lastSlashPos = strripos($vendorDir, '\\');
        $projectName = str_replace('/vendor', '', substr($vendorDir, $lastSlashPos + 1));

        echo "Project name: '".$projectName."'";

    }

}