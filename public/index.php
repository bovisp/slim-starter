<?php

require_once __DIR__ . '/../bootstrap/app.php';

require_once __DIR__ . '/../bootstrap/globalMiddleware.php';

require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../routes/api.php';

$app->run();