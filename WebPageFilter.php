<?php
class WebPageFilter{
	public $dom;

	public function __construct($fileName){
		$tidy = tidy_parse_string(utf8_encode(file_get_contents($fileName)));
		$tidy->cleanRepair();
		$html = $tidy->html();
		$html = $html->value;

		$html = $this->removeTags($html, ["script", "style"]);
		$this->dom = new DOMDocument;
		$this->dom->preserveWhiteSpace = false;
		$this->dom->loadHTML($html);
	}

	private function removeTags($html, $tagsToRemove){
		foreach ($tagsToRemove as $tag) {
			$tag = strtolower($tag);
			$html = preg_replace("/<$tag.*?\/$tag>/s", "", $html) ? : $html;
		}
		return $html;
	}

	private function getBody(){
		$body_tags = $this->dom->getElementsByTagName("body");
		$body = $body_tags->item(0);
		return trim($body->textContent);
	}
	public function getContent(){
		return $this->getBody();
	}
}
