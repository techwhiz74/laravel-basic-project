<?php

namespace LaravelBasicProject\Scripts;

use Composer\Script\Event;

class PostCreateProjectScript
{

    public static function editEnv(Event $event){
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        // Get project name from vendor dir
        $lastSlashPos = strripos($vendorDir, '\\');
        $projectName = str_replace('/vendor', '', substr($vendorDir, $lastSlashPos + 1));
        $projectDir = str_replace('/vendor', '', $vendorDir);
        echo "Project name: '".$projectName."'";

        // Edit .env file
        $envFile = $projectDir."\\.env";
        $envFileContent = file_get_contents($envFile);
        $newEnvFileContent = str_replace("LaravelBasicProject", $projectName, $envFileContent);
        $newEnvFileContent = str_replace("laravelbasicproject", strtolower($projectName), $newEnvFileContent);
        file_put_contents($envFile, $newEnvFileContent);
    }

}