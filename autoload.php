<?php

/*
 * Code element addon for Bear CMS
 * https://github.com/bearcms/code-element-addon
 * Copyright (c) Amplilabs Ltd.
 * Free to use under the MIT license.
 */

BearFramework\Addons::register('bearcms/code-element-addon', __DIR__, [
    'require' => [
        'bearcms/bearframework-addon',
        'bearframework/localization-addon',
        'ivopetkov/client-packages-bearframework-addon'
    ]
]);
