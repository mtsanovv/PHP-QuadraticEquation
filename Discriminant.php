<?php
trait Discriminant
{
	public function calculateDiscriminant()
	{
		$this->discriminant = intval($this->b) * intval($this->b) - 4 * intval($this->a) * intval($this->c);
		if($this->discriminant < 0)
		{
			$this->echoRoots("0");
		}
		else
		{
			$this->calculateRoots();
		}
	}
}
?>