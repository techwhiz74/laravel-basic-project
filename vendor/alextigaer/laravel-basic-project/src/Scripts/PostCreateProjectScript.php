<?php

namespace LaravelBasicProject\Scripts;

use Composer\Script\Event;

class PostCreateProjectScript
{

    public static function editEnv(Event $event){
        echo "\n\n".$event->getName()."\n\n";
        print_r($event->getArguments());
    }

}