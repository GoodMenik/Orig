<?

class Keyword{
	
	private $phrase;
	private $avgMonthlySearches;
	private $data = array();

	public function getPhrase()	{

		return $this->phrase;

	}

	public function setPhrase($phrase)	{

		$this->phrase = $phrase;
		$this->data[] = $phrase."\t";

	}


	public function getAvgMonthSearches()	{

		return $this->avgMonthlySearches;

	}

	public function setAvgMonthSearches($MonthSearches)	{

		$this->avgMonthlySearches = $MonthSearches;
		$this->data[] = $this->getAvgMonthSearches();
		return $this->data;

	}


}

?>