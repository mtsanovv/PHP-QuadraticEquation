<?php
trait Roots
{
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
				$canBeDividedAnyMore = true;
				while($canBeDividedAnyMore == true)
				{
					while(($c % 2) == 0 && ($a % 2) == 0)
					{
						$c = $c / 2;
						$a = $a / 2;
					}
					while(($c % 3) == 0 && ($a % 3) == 0)
					{
						$c = $c / 3;
						$a = $a / 3;
					}
					while(($c % 5) == 0 && ($a % 5) == 0)
					{
						$c = $c / 5;
						$a = $a / 5;
					}
					while(($c % 7) == 0 && ($a % 7) == 0)
					{
						$c = $c / 7;
						$a = $a / 7;
					}
					while(($c % 11) == 0 && ($a % 11) == 0)
					{
						$c = $c / 11;
						$a = $a / 11;
					}
					while(($c % 13) == 0 && ($a % 13) == 0)
					{
						$c = $c / 13;
						$a = $a / 13;
					}
					while(($c % 17) == 0 && ($a % 17) == 0)
					{
						$c = $c / 19;
						$a = $a / 19;
					}
					while(($c % 23) == 0 && ($a % 23) == 0)
					{
						$c = $c / 23;
						$a = $a / 23;
					}
					while(($c % 29) == 0 && ($a % 29) == 0)
					{
						$c = $c / 29;
						$a = $a / 29;
					}
					while(($c % 31) == 0 && ($a % 31) == 0)
					{
						$c = $c / 31;
						$a = $a / 31;
					}
					while(($c % 37) == 0 && ($a % 37) == 0)
					{
						$c = $c / 37;
						$a = $a / 37;
					}
					while(($c % 41) == 0 && ($a % 41) == 0)
					{
						$c = $c / 41;
						$a = $a / 41;
					}
					while(($c % 43) == 0 && ($a % 43) == 0)
					{
						$c = $c / 43;
						$a = $a / 43;
					}
					while(($c % 47) == 0 && ($a % 47) == 0)
					{
						$c = $c / 47;
						$a = $a / 47;
					}
					while(($c % 53) == 0 && ($a % 53) == 0)
					{
						$c = $c / 53;
						$a = $a / 53;
					}
					while(($c % 59) == 0 && ($a % 59) == 0)
					{
						$c = $c / 59;
						$a = $a / 59;
					}
					while(($c % 67) == 0 && ($a % 67) == 0)
					{
						$c = $c / 67;
						$a = $a / 67;
					}
					while(($c % 71) == 0 && ($a % 71) == 0)
					{
						$c = $c / 71;
						$a = $a / 71;
					}
					while(($c % 73) == 0 && ($a % 73) == 0)
					{
						$c = $c / 73;
						$a = $a / 73;
					}
					while(($c % 79) == 0 && ($a % 79) == 0)
					{
						$c = $c / 79;
						$a = $a / 79;
					}
					while(($c % 83) == 0 && ($a % 83) == 0)
					{
						$c = $c / 83;
						$a = $a / 83;
					}
					while(($c % 89) == 0 && ($a % 89) == 0)
					{
						$c = $c / 89;
						$a = $a / 89;
					}
					while(($c % 97) == 0 && ($a % 97) == 0)
					{
						$c = $c / 97;
						$a = $a / 97;
					}
					while(($c % 101) == 0 && ($a % 101) == 0)
					{
						$c = $c / 101;
						$a = $a / 101;
					}
					$canBeDividedAnyMore = false;
				}
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
				} elseif($a > 0 && $c > 0)
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
				$canBeDividedAnyMore = true;
				while($canBeDividedAnyMore == true)
				{
					while(($b % 2) == 0 && ($a % 2) == 0)
					{
						$b = $b / 2;
						$a = $a / 2;
					}
					while(($b % 3) == 0 && ($a % 3) == 0)
					{
						$b = $b / 3;
						$a = $a / 3;
					}
					while(($b % 5) == 0 && ($a % 5) == 0)
					{
						$b = $b / 5;
						$a = $a / 5;
					}
					while(($b % 7) == 0 && ($a % 7) == 0)
					{
						$b = $b / 7;
						$a = $a / 7;
					}
					while(($b % 11) == 0 && ($a % 11) == 0)
					{
						$b = $b / 11;
						$a = $a / 11;
					}
					while(($b % 13) == 0 && ($a % 13) == 0)
					{
						$b = $b / 13;
						$a = $a / 13;
					}
					while(($b % 17) == 0 && ($a % 17) == 0)
					{
						$b = $b / 19;
						$a = $a / 19;
					}
					while(($b % 23) == 0 && ($a % 23) == 0)
					{
						$b = $b / 23;
						$a = $a / 23;
					}
					while(($b % 29) == 0 && ($a % 29) == 0)
					{
						$b = $b / 29;
						$a = $a / 29;
					}
					while(($b % 31) == 0 && ($a % 31) == 0)
					{
						$b = $b / 31;
						$a = $a / 31;
					}
					while(($b % 37) == 0 && ($a % 37) == 0)
					{
						$b = $b / 37;
						$a = $a / 37;
					}
					while(($b % 41) == 0 && ($a % 41) == 0)
					{
						$b = $b / 41;
						$a = $a / 41;
					}
					while(($b % 43) == 0 && ($a % 43) == 0)
					{
						$b = $b / 43;
						$a = $a / 43;
					}
					while(($b % 47) == 0 && ($a % 47) == 0)
					{
						$b = $b / 47;
						$a = $a / 47;
					}
					while(($b % 53) == 0 && ($a % 53) == 0)
					{
						$b = $b / 53;
						$a = $a / 53;
					}
					while(($b % 59) == 0 && ($a % 59) == 0)
					{
						$b = $b / 59;
						$a = $a / 59;
					}
					while(($b % 67) == 0 && ($a % 67) == 0)
					{
						$b = $b / 67;
						$a = $a / 67;
					}
					while(($b % 71) == 0 && ($a % 71) == 0)
					{
						$b = $b / 71;
						$a = $a / 71;
					}
					while(($b % 73) == 0 && ($a % 73) == 0)
					{
						$b = $b / 73;
						$a = $a / 73;
					}
					while(($b % 79) == 0 && ($a % 79) == 0)
					{
						$b = $b / 79;
						$a = $a / 79;
					}
					while(($b % 83) == 0 && ($a % 83) == 0)
					{
						$b = $b / 83;
						$a = $a / 83;
					}
					while(($b % 89) == 0 && ($a % 89) == 0)
					{
						$b = $b / 89;
						$a = $a / 89;
					}
					while(($b % 97) == 0 && ($a % 97) == 0)
					{
						$b = $b / 97;
						$a = $a / 97;
					}
					while(($b % 101) == 0 && ($a % 101) == 0)
					{
						$b = $b / 101;
						$a = $a / 101;
					}
					$canBeDividedAnyMore = false;
				}
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
					$canBeDividedAnyMore = true;
					while($canBeDividedAnyMore == true)
					{
						while(($acalc % 2) == 0 && ($bcalc % 2) == 0)
						{
							$acalc = $acalc / 2;
							$bcalc = $bcalc / 2;
						}
						while(($acalc % 3) == 0 && ($bcalc % 3) == 0)
						{
							$acalc = $acalc / 3;
							$bcalc = $bcalc / 3;
						}
						while(($acalc % 5) == 0 && ($bcalc % 5) == 0)
						{
							$acalc = $acalc / 5;
							$bcalc = $bcalc / 5;
						}
						while(($acalc % 7) == 0 && ($bcalc % 7) == 0)
						{
							$acalc = $acalc / 7;
							$bcalc = $bcalc / 7;
						}
						while(($acalc % 11) == 0 && ($bcalc % 11) == 0)
						{
							$acalc = $acalc / 11;
							$bcalc = $bcalc / 11;
						}
						while(($acalc % 13) == 0 && ($bcalc % 13) == 0)
						{
							$acalc = $acalc / 13;
							$bcalc = $bcalc / 13;
						}
						while(($acalc % 17) == 0 && ($bcalc % 17) == 0)
						{
							$acalc = $acalc / 19;
							$bcalc = $bcalc / 19;
						}
						while(($acalc % 23) == 0 && ($bcalc % 23) == 0)
						{
							$acalc = $acalc / 23;
							$bcalc = $bcalc / 23;
						}
						while(($acalc % 29) == 0 && ($bcalc % 29) == 0)
						{
							$acalc = $acalc / 29;
							$bcalc = $bcalc / 29;
						}
						while(($acalc % 31) == 0 && ($bcalc % 31) == 0)
						{
							$acalc = $acalc / 31;
							$bcalc = $bcalc / 31;
						}
						while(($acalc % 37) == 0 && ($bcalc % 37) == 0)
						{
							$acalc = $acalc / 37;
							$bcalc = $bcalc / 37;
						}
						while(($acalc % 41) == 0 && ($bcalc % 41) == 0)
						{
							$acalc = $acalc / 41;
							$bcalc = $bcalc / 41;
						}
						while(($acalc % 43) == 0 && ($bcalc % 43) == 0)
						{
							$acalc = $acalc / 43;
							$bcalc = $bcalc / 43;
						}
						while(($acalc % 47) == 0 && ($bcalc % 47) == 0)
						{
							$acalc = $acalc / 47;
							$bcalc = $bcalc / 47;
						}
						while(($acalc % 53) == 0 && ($bcalc % 53) == 0)
						{
							$acalc = $acalc / 53;
							$bcalc = $bcalc / 53;
						}
						while(($acalc % 59) == 0 && ($bcalc % 59) == 0)
						{
							$acalc = $acalc / 59;
							$bcalc = $bcalc / 59;
						}
						while(($acalc % 67) == 0 && ($bcalc % 67) == 0)
						{
							$acalc = $acalc / 67;
							$bcalc = $bcalc / 67;
						}
						while(($acalc % 71) == 0 && ($bcalc % 71) == 0)
						{
							$acalc = $acalc / 71;
							$bcalc = $bcalc / 71;
						}
						while(($acalc % 73) == 0 && ($bcalc % 73) == 0)
						{
							$acalc = $acalc / 73;
							$bcalc = $bcalc / 73;
						}
						while(($acalc % 79) == 0 && ($bcalc % 79) == 0)
						{
							$acalc = $acalc / 79;
							$bcalc = $bcalc / 79;
						}
						while(($acalc % 83) == 0 && ($bcalc % 83) == 0)
						{
							$acalc = $acalc / 83;
							$bcalc = $bcalc / 83;
						}
						while(($acalc % 89) == 0 && ($bcalc % 89) == 0)
						{
							$acalc = $acalc / 89;
							$bcalc = $bcalc / 89;
						}
						while(($acalc % 97) == 0 && ($bcalc % 97) == 0)
						{
							$acalc = $acalc / 97;
							$bcalc = $bcalc / 97;
						}
						while(($acalc % 101) == 0 && ($bcalc % 101) == 0)
						{
							$acalc = $acalc / 101;
							$bcalc = $bcalc / 101;
						}
						$canBeDividedAnyMore = false;
					}
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
					$canBeDividedAnyMore = true;
					while($canBeDividedAnyMore == true)
					{
						while(($acalc % 2) == 0 && ($bcalc % 2) == 0)
						{
							$acalc = $acalc / 2;
							$bcalc = $bcalc / 2;
						}
						while(($acalc % 3) == 0 && ($bcalc % 3) == 0)
						{
							$acalc = $acalc / 3;
							$bcalc = $bcalc / 3;
						}
						while(($acalc % 5) == 0 && ($bcalc % 5) == 0)
						{
							$acalc = $acalc / 5;
							$bcalc = $bcalc / 5;
						}
						while(($acalc % 7) == 0 && ($bcalc % 7) == 0)
						{
							$acalc = $acalc / 7;
							$bcalc = $bcalc / 7;
						}
						while(($acalc % 11) == 0 && ($bcalc % 11) == 0)
						{
							$acalc = $acalc / 11;
							$bcalc = $bcalc / 11;
						}
						while(($acalc % 13) == 0 && ($bcalc % 13) == 0)
						{
							$acalc = $acalc / 13;
							$bcalc = $bcalc / 13;
						}
						while(($acalc % 17) == 0 && ($bcalc % 17) == 0)
						{
							$acalc = $acalc / 19;
							$bcalc = $bcalc / 19;
						}
						while(($acalc % 23) == 0 && ($bcalc % 23) == 0)
						{
							$acalc = $acalc / 23;
							$bcalc = $bcalc / 23;
						}
						while(($acalc % 29) == 0 && ($bcalc % 29) == 0)
						{
							$acalc = $acalc / 29;
							$bcalc = $bcalc / 29;
						}
						while(($acalc % 31) == 0 && ($bcalc % 31) == 0)
						{
							$acalc = $acalc / 31;
							$bcalc = $bcalc / 31;
						}
						while(($acalc % 37) == 0 && ($bcalc % 37) == 0)
						{
							$acalc = $acalc / 37;
							$bcalc = $bcalc / 37;
						}
						while(($acalc % 41) == 0 && ($bcalc % 41) == 0)
						{
							$acalc = $acalc / 41;
							$bcalc = $bcalc / 41;
						}
						while(($acalc % 43) == 0 && ($bcalc % 43) == 0)
						{
							$acalc = $acalc / 43;
							$bcalc = $bcalc / 43;
						}
						while(($acalc % 47) == 0 && ($bcalc % 47) == 0)
						{
							$acalc = $acalc / 47;
							$bcalc = $bcalc / 47;
						}
						while(($acalc % 53) == 0 && ($bcalc % 53) == 0)
						{
							$acalc = $acalc / 53;
							$bcalc = $bcalc / 53;
						}
						while(($acalc % 59) == 0 && ($bcalc % 59) == 0)
						{
							$acalc = $acalc / 59;
							$bcalc = $bcalc / 59;
						}
						while(($acalc % 67) == 0 && ($bcalc % 67) == 0)
						{
							$acalc = $acalc / 67;
							$bcalc = $bcalc / 67;
						}
						while(($acalc % 71) == 0 && ($bcalc % 71) == 0)
						{
							$acalc = $acalc / 71;
							$bcalc = $bcalc / 71;
						}
						while(($acalc % 73) == 0 && ($bcalc % 73) == 0)
						{
							$acalc = $acalc / 73;
							$bcalc = $bcalc / 73;
						}
						while(($acalc % 79) == 0 && ($bcalc % 79) == 0)
						{
							$acalc = $acalc / 79;
							$bcalc = $bcalc / 79;
						}
						while(($acalc % 83) == 0 && ($bcalc % 83) == 0)
						{
							$acalc = $acalc / 83;
							$bcalc = $bcalc / 83;
						}
						while(($acalc % 89) == 0 && ($bcalc % 89) == 0)
						{
							$acalc = $acalc / 89;
							$bcalc = $bcalc / 89;
						}
						while(($acalc % 97) == 0 && ($bcalc % 97) == 0)
						{
							$acalc = $acalc / 97;
							$bcalc = $bcalc / 97;
						}
						while(($acalc % 101) == 0 && ($bcalc % 101) == 0)
						{
							$acalc = $acalc / 101;
							$bcalc = $bcalc / 101;
						}
						$canBeDividedAnyMore = false;
					}
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
				$acalc = intval($first1);
				$bcalc = intval($second);
				$canBeDividedAnyMore = true;
				while($canBeDividedAnyMore == true)
				{
					while(($acalc % 2) == 0 && ($bcalc % 2) == 0)
					{
						$acalc = $acalc / 2;
						$bcalc = $bcalc / 2;
					}
					while(($acalc % 3) == 0 && ($bcalc % 3) == 0)
					{
						$acalc = $acalc / 3;
						$bcalc = $bcalc / 3;
					}
					while(($acalc % 5) == 0 && ($bcalc % 5) == 0)
					{
						$acalc = $acalc / 5;
						$bcalc = $bcalc / 5;
					}
					while(($acalc % 7) == 0 && ($bcalc % 7) == 0)
					{
						$acalc = $acalc / 7;
						$bcalc = $bcalc / 7;
					}
					while(($acalc % 11) == 0 && ($bcalc % 11) == 0)
					{
						$acalc = $acalc / 11;
						$bcalc = $bcalc / 11;
					}
					while(($acalc % 13) == 0 && ($bcalc % 13) == 0)
					{
						$acalc = $acalc / 13;
						$bcalc = $bcalc / 13;
					}
					while(($acalc % 17) == 0 && ($bcalc % 17) == 0)
					{
						$acalc = $acalc / 19;
						$bcalc = $bcalc / 19;
					}
					while(($acalc % 23) == 0 && ($bcalc % 23) == 0)
					{
						$acalc = $acalc / 23;
						$bcalc = $bcalc / 23;
					}
					while(($acalc % 29) == 0 && ($bcalc % 29) == 0)
					{
						$acalc = $acalc / 29;
						$bcalc = $bcalc / 29;
					}
					while(($acalc % 31) == 0 && ($bcalc % 31) == 0)
					{
						$acalc = $acalc / 31;
						$bcalc = $bcalc / 31;
					}
					while(($acalc % 37) == 0 && ($bcalc % 37) == 0)
					{
						$acalc = $acalc / 37;
						$bcalc = $bcalc / 37;
					}
					while(($acalc % 41) == 0 && ($bcalc % 41) == 0)
					{
						$acalc = $acalc / 41;
						$bcalc = $bcalc / 41;
					}
					while(($acalc % 43) == 0 && ($bcalc % 43) == 0)
					{
						$acalc = $acalc / 43;
						$bcalc = $bcalc / 43;
					}
					while(($acalc % 47) == 0 && ($bcalc % 47) == 0)
					{
						$acalc = $acalc / 47;
						$bcalc = $bcalc / 47;
					}
					while(($acalc % 53) == 0 && ($bcalc % 53) == 0)
					{
						$acalc = $acalc / 53;
						$bcalc = $bcalc / 53;
					}
					while(($acalc % 59) == 0 && ($bcalc % 59) == 0)
					{
						$acalc = $acalc / 59;
						$bcalc = $bcalc / 59;
					}
					while(($acalc % 67) == 0 && ($bcalc % 67) == 0)
					{
						$acalc = $acalc / 67;
						$bcalc = $bcalc / 67;
					}
					while(($acalc % 71) == 0 && ($bcalc % 71) == 0)
					{
						$acalc = $acalc / 71;
						$bcalc = $bcalc / 71;
					}
					while(($acalc % 73) == 0 && ($bcalc % 73) == 0)
					{
						$acalc = $acalc / 73;
						$bcalc = $bcalc / 73;
					}
					while(($acalc % 79) == 0 && ($bcalc % 79) == 0)
					{
						$acalc = $acalc / 79;
						$bcalc = $bcalc / 79;
					}
					while(($acalc % 83) == 0 && ($bcalc % 83) == 0)
					{
						$acalc = $acalc / 83;
						$bcalc = $bcalc / 83;
					}
					while(($acalc % 89) == 0 && ($bcalc % 89) == 0)
					{
						$acalc = $acalc / 89;
						$bcalc = $bcalc / 89;
					}
					while(($acalc % 97) == 0 && ($bcalc % 97) == 0)
					{
						$acalc = $acalc / 97;
						$bcalc = $bcalc / 97;
					}
					while(($acalc % 101) == 0 && ($bcalc % 101) == 0)
					{
						$acalc = $acalc / 101;
						$bcalc = $bcalc / 101;
					}
					$canBeDividedAnyMore = false;
				}
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