<?php
\Ubiquity\cache\CacheManager::startProd($config);
\Ubiquity\controllers\Router::start();
\Ubiquity\assets\AssetsManager::start($config);

