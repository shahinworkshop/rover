<?php

use PHPUnit\Framework\TestCase;

class FormatterTest extends TestCase
{
    /**
     * Check result of price range filter
     */
    public function testFormatResult(): void
    {
        $newFormatter = new \App\controller\Formatter();
        $result = $newFormatter->format(1,2,'W');
        $this->assertEquals($result, '1 2 W'.PHP_EOL);
    }
}
