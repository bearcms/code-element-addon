<?php
/*
 * Code element addon for Bear CMS
 * https://github.com/bearcms/code-element-addon
 * Copyright (c) Amplilabs Ltd.
 * Free to use under the MIT license.
 */

use BearFramework\App;

$app = App::get();
$context = $app->contexts->get(__FILE__);

$code = (string) $component->code;
$language = (string) $component->language;

$elementID = 'bce' . md5(uniqid());
echo '<html>';
echo '<head>';
echo '<link rel="client-packages-embed" name="-bearcms-code-element-highlight-' . $language . '">';
echo '</head>';
echo '<body>';
echo '<code class="bearcms-code-element" id="' . $elementID . '">' . htmlspecialchars($code) . '</code>';
echo '<script>clientPackages.get("-bearcms-code-element-highlight-' . $language . '").then(function(o){';
echo 'var b=document.getElementById("' . $elementID . '");';
echo 'var r=o.library.highlight("' . $language . '",b.innerText);';
echo 'try{b.innerHTML=o.update(r.value);}catch(e){};';
echo '});</script>';
echo '</body>';
echo '</html>';
