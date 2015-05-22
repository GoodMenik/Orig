<?php

require_once ("class_keyword.php");

class KeywordList {
	protected $fname;
	private   $data;
	
	public function setFilepath($fname)	{

		fopen($fname, "a+t");
		$this->fname = $fname;

	}

	public function getFilepath()	{

		return $this->fname;

	}

	public function getCount()	{
		
		$fline = count(file($this->fname));
		return $fline;

	}

	public function add($keyword)	{
		
		$text = implode($keyword, "\t");
		$text = $text."\n";
		$this->save($text, FILE_APPEND);

	}

	private function load()	{

		return file_get_contents($this->fname);

	}

	private function save($data, $flag){

		return file_put_contents($this->fname, $data, $flag);

	}


	public function delete($keyword){

		$file = $this->load();

		$data 	= explode("\n", $file);
		$texKey = implode("\t", $keyword);

		if(!$key = array_search($texKey, $data))	{
			echo 'Значение не найденно';
		} else {
		unset($data[$key]);

		$data = implode("\n", $data);

		$this->save($data, NULL);

		}

	}

}

$keywordsFile = 'keys.txt';
$keywordList = new KeywordList();
$keywordList->setFilepath($keywordsFile);

echo 'В списке ' ,  $keywordList->getCount() , ' ключей'; // 0

$keyProperty = new Keyword();
$keyProperty->setPhrase('Kolo');
$a = $keyProperty->setAvgMonthSearches(200500);

// echo 'В списке ' ,  $keywordListList->getCount() , ' ключей';

// $keywordList->add($a);

// echo 'В списке ' ,  $keywordList->getCount() , ' ключей';

// $keywordList->delete($a);

// echo 'Ключи сохранены в файл - ' , $keywordList->getFilepath();









### function for text. not array.
	// public function delete($keywordDel)	{
	// 	$file = $this->load();
	// 	$data = explode("\t", $file);

	// 	if(!$key  = array_search($keywordDel, $data))	{
	// 		echo 'Значение не найденно.';
	// 	} else {

	// 	unset($data[$key]);
	// 	$data = implode("\n", $data);
	// 	$this->save($data, NULL);

	// 	}
	// }
###

?>