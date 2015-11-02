<?php
require_once __DIR__ . "/WebPageFilter.php";

class WebPageFilterTest extends PHPUnit_Framework_TestCase
{
    public function testGetContent()
    {
        $html = "<html><head><title<>?>rand</title></head><body><script src=''>sad</script><style>sad</style>hello<a>another thing</a></body></html>";
        file_put_contents("./test.html", $html);
        $webFilter = new WebPageFilter("./test.html");
		$content = $webFilter->getContent();
		$this->assertEquals("helloanother thing", $content);
    }
}