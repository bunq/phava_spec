<?php
spl_autoload_register(
    function (string $classPath) {
        $allClassPathPart = explode('\\', $classPath);
        $className = array_pop($allClassPathPart);
        $directoryName = array_pop($allClassPathPart);

        require vsprintf('%s/../%s/%s.php', [__DIR__, $directoryName, $className]);
    }
);
