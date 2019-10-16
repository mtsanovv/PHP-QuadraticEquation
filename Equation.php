<?php

include 'Roots.php';
include 'Discriminant.php';

class Equation
{
	use Roots;
	use Discriminant;
	
	
	public $equation;
	public $a;
	public $b;
	public $c;
	public $incompleteQuadratic;
	public $satisfaction = "n";
	public $discriminant;
	public $root1;
	public $root2;
	
	public function __construct()
	{
		$mask = "%5.5s %-150.50s \n";
		printf($mask, '', '');
		printf($mask, '|||', 'Quadratic Equation Solver for PHP-CLI');
		printf($mask, '|||', '       Written by M Tsanov');
		echo PHP_EOL;
		echo "  " . PHP_EOL;
	}
	public function initialize()
	{
		while($this->satisfaction == "n")
		{
			echo "  " . PHP_EOL;
			echo "Enter value for a (empty values evaluate to 1): ";
			$this->a = $this->getInput();
			echo "Enter value for b (DON'T leave it empty if you need it to be 1): ";
			$this->b = $this->getInput();
			echo "Enter value for c (DON'T leave it empty if you need it to be 1): ";
			$this->c = $this->getInput();
			echo " " . PHP_EOL;
			if($this->a == null)
			{
				$this->a = "1";
			}
			if((is_numeric(substr($this->a, 1)) || is_numeric(substr($this->a, 0))))
			{
				$posaplus = strpos($this->a, "+");
				$posaminus = strpos($this->a, "-");
				$posbplus = strpos($this->b, "+");
				$posbminus = strpos($this->b, "-");
				$poscplus = strpos($this->c, "+");
				$poscminus = strpos($this->c, "-");
				if($posbplus === false && $posbminus === false && $this->b != null && is_numeric(substr($this->b, 0)))
				{
					$this->b = "+" . $this->b;
				}
				if($poscplus === false && $poscminus === false && $this->c != null && is_numeric(substr($this->c, 0)))
				{
					$this->c = "+" . $this->c;
				}
				$realA = $this->a;
				$realB = $this->b;
				$realC = $this->c;
				if($posaplus === false && $posaminus !== false)
				{
					$this->a = substr($this->a, 1);
					$this->b = 0 - $this->b;
					$this->c = 0 - $this->c;
				}
				if($realB == "+1")
				{
					$realB = "+";
				}
				elseif($realB == "-1")
				{
					$realB = "-";
				}
				if($realA == "1")
				{
					$realA = "";
				}
				elseif($realA == "-1")
				{
					$realA = "-";
				}
				if(($this->b == null || $this->b == "+0" || $this->b == "-0") && $this->c != null)
				{
					$this->incompleteQuadratic = "b";
					$this->equation = "{$realA}x²{$realC} = 0";
					echo "The quadratic equation you have input is {$this->equation}. Is that the equation you need? [y/n]: ";
				}
				elseif($this->b != null && ($this->c == null || $this->c == "+0" || $this->c == "-0"))
				{
					$this->incompleteQuadratic = "c";
					$this->equation = "{$realA}x²{$realB}x = 0";
					echo "The quadratic equation you have input is {$this->equation}. Is that the equation you need? [y/n]: ";
				}
				elseif(($this->b == null || $this->b == "+0" || $this->b == "-0") && ($this->c == null || $this->c == "+0" || $this->c == "-0"))
				{
					$this->incompleteQuadratic = "bc";
					$this->equation = "{$realA}x² = 0";
					echo "The quadratic equation you have input is {$this->equation}. Is that the equation you need? [y/n]: ";
				}
				else
				{
					$this->incompleteQuadratic = "none";
					if(!is_numeric($this->b))
					{
						$this->incompleteQuadratic = "b";
						echo "b cannot be anything else than numeric or null Evaluating b to 0!" . PHP_EOL;
						$this->b = "+0";
					}
					if(!is_numeric($this->c))
					{
						if(strlen($this->incompleteQuadratic > 0))
						{
							$this->incompleteQuadratic = "bc";
						}
						else
						{
							$this->incompleteQuadratic = "c";
						}
						echo "c cannot be anything else than numeric or null. Evaluating c to 0!" . PHP_EOL;
						$this->c = null;
					}
					$this->equation = "{$realA}x²{$realB}x{$realC} = 0";
					echo "The quadratic equation you have input is {$this->equation}. Is that the equation you need? [y/n]: ";
				}
				$this->satisfaction = strtolower($this->getInput());
				echo PHP_EOL;
			}
			else
			{
				echo "a value must be numeric and non-null, either the equation won't be quadratic!" . PHP_EOL;
				$this->satisfaction = "n";
			}
		}
		$this->prepareForDiscriminant();
	}
	public function getInput() {
		return trim(fgets(STDIN));
	}
	public function echoRoots($rootsCount)
	{
		if($rootsCount == "0")
		{
			echo "The equation {$this->equation} has no real roots.";
		}
		elseif($rootsCount == "1")
		{
			echo "The equation {$this->equation} has one double root {$this->root1}.";
		}
		elseif($rootsCount == "2")
		{
			echo "The equation {$this->equation} has two roots {$this->root1} and {$this->root2}.";
		}
		echo PHP_EOL;
		echo PHP_EOL . "Would you like to calculate another equation? [y/n]: ";
		$response = strtolower($this->getInput());
		if($response == "y" || $response == null)
		{
			$this->satisfaction = "n";
			$this->initialize();
			echo "  " . PHP_EOL;
		}
		else
		{
			exit(0);
		}
	}
}
?>