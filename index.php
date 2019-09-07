<?php

/*
 * Code element addon for Bear CMS
 * https://github.com/bearcms/code-element-addon
 * Copyright (c) Amplilabs Ltd.
 * Free to use under the MIT license.
 */

use BearFramework\App;

$app = App::get();

$app->bearCMS->addons
    ->register('bearcms/code-element-addon', function (\BearCMS\Addons\Addon $addon) use ($app) {
        $addon->initialize = function () use ($app) {
            $context = $app->contexts->get(__FILE__);

            $context->assets->addDir('assets');

            $app->localization
                ->addDictionary('en', function () use ($context) {
                    return include $context->dir . '/locales/en.php';
                })
                ->addDictionary('bg', function () use ($context) {
                    return include $context->dir . '/locales/bg.php';
                });

            \BearCMS\Internal\ElementsTypes::add('code', [
                'componentSrc' => 'bearcms-code-element',
                'componentFilename' => $context->dir . '/components/codeElement.php',
                'fields' => [
                    [
                        'id' => 'code',
                        'type' => 'textbox'
                    ],
                    [
                        'id' => 'language',
                        'type' => 'textbox'
                    ]
                ]
            ]);

            $languages = [
                'apache' => 'Apache',
                'bash' => 'Bash',
                'cplusplus' => 'C++',
                'csharp' => 'C#',
                'css' => 'CSS',
                'dart' => 'Dart',
                'go' => 'Go',
                'html' => 'HTML',
                'java' => 'Java',
                'javascript' => 'JavaScript',
                'json' => 'JSON',
                'kotlin' => 'Kotlin',
                'less' => 'LESS',
                'markdown' => 'Markdown',
                'nginx' => 'NGINX',
                'objectivec' => 'Objective-C',
                'perl' => 'Perl',
                'php' => 'PHP',
                'plaintext' => 'Plain text',
                'python' => 'Python',
                'ruby' => 'Ruby',
                'rust' => 'Rust',
                'shell' => 'Shell',
                'swift' => 'Swift',
                'typescript' => 'TypeScript',
                'xml' => 'XML',
                'yaml' => 'YAML',
            ];

            \BearCMS\Internal\Config::$appSpecificServerData['kzn49al1'] = json_encode($languages);

            \BearCMS\Internal\Themes::$elementsOptions['code'] = function ($context, $idPrefix, $parentSelector) {
                $groupCode = $context->addGroup(__('bearcms.addon.code-element.theme.options.Code'));
                $groupCode->addOption($idPrefix . "CodeCSS", "css", '', [
                    "cssOutput" => [
                        ["rule", $parentSelector . " .bearcms-code-element", "overflow:auto;white-space:pre;word-wrap:normal;display:block;"],
                        ["selector", $parentSelector . " .bearcms-code-element"]
                    ],
                    "value" => '{"color":"#333333","background-color":"#f8f8f8","padding-top":"10px","padding-bottom":"10px","padding-left":"10px","padding-right":"10px"}'
                ]);
                $entitiesGroup = $groupCode->addGroup(__('bearcms.addon.code-element.theme.options.Entities'));
                $keywordEntityGroup = $entitiesGroup->addGroup(__('bearcms.addon.code-element.theme.options.Entities.Keyword'));
                $keywordEntityGroup->addOption($idPrefix . "CodeEntityKeywordCSS", "css", '', [
                    "cssTypes" => ["cssText", "cssTextShadow"],
                    "cssOutput" => [
                        ["selector", $parentSelector . " .bearcms-code-element .bearcms-code-element-entity-keyword"]
                    ],
                    "value" => '{"color":"#333333"}'
                ]);
                $variableEntityGroup = $entitiesGroup->addGroup(__('bearcms.addon.code-element.theme.options.Entities.Variable'));
                $variableEntityGroup->addOption($idPrefix . "CodeEntityVariableCSS", "css", '', [
                    "cssTypes" => ["cssText", "cssTextShadow"],
                    "cssOutput" => [
                        ["selector", $parentSelector . " .bearcms-code-element .bearcms-code-element-entity-variable"]
                    ],
                    "value" => '{"color":"#008080"}'
                ]);
                $valueEntityGroup = $entitiesGroup->addGroup(__('bearcms.addon.code-element.theme.options.Entities.Value'));
                $valueEntityGroup->addOption($idPrefix . "CodeEntityValueCSS", "css", '', [
                    "cssTypes" => ["cssText", "cssTextShadow"],
                    "cssOutput" => [
                        ["selector", $parentSelector . " .bearcms-code-element .bearcms-code-element-entity-value"]
                    ],
                    "value" => '{"color":"#dd1144"}'
                ]);
                $commentEntityGroup = $entitiesGroup->addGroup(__('bearcms.addon.code-element.theme.options.Entities.Comment'));
                $commentEntityGroup->addOption($idPrefix . "CodeEntityCommentCSS", "css", '', [
                    "cssTypes" => ["cssText", "cssTextShadow"],
                    "cssOutput" => [
                        ["selector", $parentSelector . " .bearcms-code-element .bearcms-code-element-entity-comment"]
                    ],
                    "value" => '{"color":"#999988"}'
                ]);
            };

            $app->clientPackages
                ->add('-bearcms-code-element-highlight', function ($package) use ($context) {
                    $code = 'window.bearcmscodeelementh={};';
                    $libraryCode = include $context->dir . '/helpers/highlightjs/highlight.js.php';
                    $code .= 'var f=' . $libraryCode . 'f(window.bearcmscodeelementh);';
                    $code .= 'window.bearcmscodeelementh.configure({classPrefix:"bearcms-code-element-entity-internal-"});';
                    //$updateCode = file_get_contents($context->dir . '/dev/update.js');
                    $updateCode = 'function(b){var d={comment:"comment",quote:"comment",doctag:"comment",keyword:"keyword","selector-tag":"keyword",variable:"variable","template-variable":"variable","entity-attr":"variable",attr:"variable",number:"value",literal:"value",regexp:"value",string:"value",subst:"value",symbol:"value"},c;for(c in d)b=b.split("bearcms-code-element-entity-internal-"+c).join("bearcms-code-element-entity-"+d[c]);return b=b.replace(RegExp(\' class="bearcms-code-element-entity-internal-[a-z-]*"\',"g"),"")};';
                    $code .= 'window.bearcmscodeelementu=' . $updateCode;
                    $package->addJSCode($code);
                    $package->get = 'return {"library":window.bearcmscodeelementh,"update":window.bearcmscodeelementu};';
                });
            foreach ($languages as $language) {
                $app->clientPackages
                    ->add('-bearcms-code-element-highlight-' . $language, function ($package) use ($context, $language) {
                        $languageCode = include $context->dir . '/helpers/highlightjs/languages/' . $language . '.js.php';
                        $code = 'clientPackages.get("-bearcms-code-element-highlight").then(function(o){';
                        $code .= 'var f=' . $languageCode . ';o.library.registerLanguage("' . $language . '",f);';
                        $code .= '});';
                        $package->addJSCode($code);
                        $package->embedPackage('-bearcms-code-element-highlight');
                        $package->get = 'return {"library":window.bearcmscodeelementh,"update":window.bearcmscodeelementu};';
                    });
            }
        };
    });
