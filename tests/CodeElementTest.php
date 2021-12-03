<?php

/*
 * Social sharing addon for Bear Framework
 * https://github.com/ivopetkov/social-sharing-bearframework-addon
 * Copyright (c) Ivo Petkov
 * Free to use under the MIT license.
 */

/**
 * @runTestsInSeparateProcesses
 */
class CodeElementTest extends BearCMS\AddonTests\PHPUnitTestCase
{
    /**
     * 
     */
    public function testOutput()
    {
        $app = $this->getApp();

        $html = '<bearcms-code-element code="test-code"/>';
        $result = $app->components->process($html);

        $this->assertTrue(strpos($result, '<code class="bearcms-code-element"') !== false);
        $this->assertTrue(strpos($result, 'test-code') !== false);
    }
}
