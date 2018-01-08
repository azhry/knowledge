<?php 

class Turbo_bm_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	private function makeCharTable($string)
	{
		$len = strlen($string);
		$table = [];
		for ($i = 0; $i < $len; $i++)
		{
			$table[$string[$i]] = $len - $i - 1;
		}
		return $table;
	}

	// turbo boyer moore
	public function search($text, $pattern)
	{
		$patlen = strlen($pattern);
		$textlen = strlen($text);
		$table = $this->makeCharTable($pattern);

		for ($i = $patlen - 1; $i < $textlen; )
		{
			$t = $i;
			for ($j = $patlen - 1; $pattern[$j] == $text[$i]; $j--, $i--)
			{
				if ($j == 0) return $i;
				// {
					// echo 'Found at ' . $i . '<br>'; 
					
				// }
			}
			$i = $t;
			if (array_key_exists($text[$i], $table))
			{
				// echo 'Shift by ' . max($table[$text[$i]], 1) . '<br>';
				$i = $i + max($table[$text[$i]], 1);
			}
			else
			{
				// echo 'Shift by ' . $patlen . '<br>';
				$i += $patlen;
			}
		}

		return -1;
	}
}