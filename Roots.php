<?php
trait Roots
{
	private function factorByPrimeNumbers($a, $b)
	{
		$biggestFactor = 101; //biggest prime number we use to factor, more than that is just useless
		for($i = 2; $i <= $biggestFactor; $i++)
		{
			for($j = 2; $j < $i; $j++)
			{
				if($i % $j == 0)
				{
					break;
				}
			}

			if($i == $j)
			{
				//found a prime
				while(($a % $i) == 0 && ($b % $i) == 0)
				{
					$a /= $i;
					$b /= $i;
				}
			}
		}

		return [$a, $b];
	}
	public function prepareForDiscriminant()
	{
		if($this->incompleteQuadratic == "b")
		{
			$a = $this->a;
			$c = $this->c;
			$c = 0 - $c;
			$result = $c / $a;
			if($c % $a != 0)
			{
				$factoredCoefficients = $this->factorByPrimeNumbers($a, $c);
				$a = $factoredCoefficients[0];
				$c = $factoredCoefficients[1];
				if($a < 0 && $c < 0)
				{
					$a = 0 - $a;
					$c = 0 - $c;
					$squareA = sqrt($a);
					$squareC = sqrt($c);
					if(strpos($squareC, ".") !== false)
					{
						$a = "√" . $a;
					}
					else
					{
						$c = $squareC;
					}
					if(strpos($squareA, ".") !== false)
					{
						if(strpos($c, "√") !== false)
						{
							$myNewC = substr($c, 1);
							$myNewC = $a * $c;
							$squaredNumerator = sqrt($myNewC);
							if($myNewC % $squaredNumerator != 0)
							{
								$c = "√" . $myNewC;
							}
							else
							{
								$c = $squaredNumerator;
							}
						}
					}
					else
					{
						$a = $squareA;
					}
				} 
				elseif($a > 0 && $c > 0)
				{
					$squareA = sqrt($a);
					$squareC = sqrt($c);
					if(strpos($squareC, ".") !== false)
					{
						$c = "√" . "{$c}";
					}
					else
					{
						$c = "{$squareC}";
					}
					if(strpos($squareA, ".") !== false)
					{
						if(strpos($c, "√") !== false)
						{
							$myNewC = str_replace("√", "", $c);
							$myNewC = $a * $myNewC;
							$squaredNumerator = sqrt($myNewC);
							if(strpos($squaredNumerator, ".") !== false)
							{
								$c = "√" . $myNewC;
							}
							else
							{
								$c = $squaredNumerator;
							}
						}
						else
						{
							$c = $c . "√" . $a;
						}
					}
					else
					{
						$a = $squareA;
					}
					$this->root1 = $c . "/" . $a;
					$this->root2 = "-" . $c . "/" . $a;
					$this->echoRoots("2");
				}
				else
				{
					if($a < 0)
					{
						$this->echoRoots("0");
					}
					elseif($c < 0)
					{
						$this->echoRoots("0");
					}
					else
					{
						$this->root1 = $c . "/" . $a;
						$this->root2 = "-" . $c . "/" . $a;
						$this->echoRoots("2");
					}
				}
				
			}
			else
			{
				$squareResult = sqrt($result);
				if($result < 0)
				{
					$this->echoRoots("0");
				}
				elseif(strpos($squareResult, ".") !== false)
				{
					$result = "√" . $result;
					$this->root1 = $result;
					$this->root2 = "-" . $result;
					$this->echoRoots("2");
				}
				else
				{
					$this->root1 = $squareResult;
					$this->root2 = "-" . $squareResult;
					$this->echoRoots("2");
				}
			}
		}
		elseif($this->incompleteQuadratic == "c")
		{
			$this->root1 = 0;
			$a = $this->a;
			$b = 0 - $this->b;
			$result = $b / $a;
			if($b % $a != 0)
			{
				$factoredCoefficients = $this->factorByPrimeNumbers($a, $b);
				$a = $factoredCoefficients[0];
				$b = $factoredCoefficients[1];
				$this->root2 = $b . "/" . $a;
				$this->echoRoots("2");
			}
			else
			{
				$this->root2 = $result;
				$this->echoRoots("2");
			}
		}
		elseif($this->incompleteQuadratic == "bc")
		{
			$this->root1 = 0;
			$this->echoRoots("1");
		}
		elseif($this->incompleteQuadratic == "none")
		{
			$this->calculateDiscriminant();
		}
		
	}
	public function calculateRoots()
	{
		if($this->discriminant > 0)
		{
			$sqrt = sqrt($this->discriminant);
			if(strpos($sqrt, ".") !== false)
			{
				$this->root1 = 0 - $this->b . "+√{$this->discriminant}" . "/" . 2 * $this->a;
				$this->root2 = 0 - $this->b . "-√{$this->discriminant}" . "/" . 2 * $this->a;
				$this->echoRoots("2");
			}
			else
			{
				$firstroot = 0 - $this->b - $sqrt;
				$secondroot = 0 - $this->b + $sqrt;
				$denominator = 2 * $this->a;
				if($firstroot % $denominator != 0)
				{
					$acalc = $firstroot;
					$bcalc = $denominator;
					$factoredCoefficients = $this->factorByPrimeNumbers($acalc, $bcalc);
					$acalc = $factoredCoefficients[0];
					$bcalc = $factoredCoefficients[1];
					if($bcalc != 1)
					{
						$this->root1 = $acalc . "/" . $bcalc;
					}
					else
					{
						$this->root1 = $acalc;
					}
				}
				else
				{
					$this->root1 = $firstroot / $denominator;
				}
				if($secondroot % $denominator != 0)
				{
					$acalc = $secondroot;
					$bcalc = $denominator;
					$factoredCoefficients = $this->factorByPrimeNumbers($acalc, $bcalc);
					$acalc = $factoredCoefficients[0];
					$bcalc = $factoredCoefficients[1];
					if($bcalc != 1)
					{
						$this->root2 = $acalc . "/" . $bcalc;
					}
					else
					{
						$this->root2 = $acalc;
					}
				}
				else
				{
					$this->root2 = $secondroot / $denominator;
				}
				$this->echoRoots("2");
			}
		}
		else
		{
			$firstroot = 0 - $this->b;
			$denominator = $this->a * 2;
			if($firstroot % $denominator != 0)
			{
				$acalc = intval($firstroot);
				$bcalc = intval($denominator);
				$factoredCoefficients = $this->factorByPrimeNumbers($acalc, $bcalc);
				$acalc = $factoredCoefficients[0];
				$bcalc = $factoredCoefficients[1];
				if($bcalc != 1)
				{
					$this->root1 = $acalc . "/" . $bcalc;
				}
				else
				{
					$this->root1 = $acalc;
				}
			}
			else
			{
				$this->root1 = $firstroot / $denominator;
			}

			$this->echoRoots("1");
		}
	}
}
?>
