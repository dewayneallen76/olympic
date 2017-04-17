<?php 

class Rectangle 
{
	protected $height;
	protected $width;

	public function __construct($height, $width)
	{
		// Self encapsulation
		$this->setHeight($height);
		$this->setWidth($width);
	}

	public function setHeight($height)
	{
		$this->height = $height; // 1 assignment
	}

	public function setWidth($width)
	{
		$this->width = $width;
	}

	public function getHeight() 
	{
		return $this->height; // 1 return 
	}

	public function getWidth()
	{
		return $this->width;
	}

	public function area() 
	{
		return $this->getHeight() * $this->getWidth();
	}

	public function perimeter()
	{
		return $this->getHeight() * 4;
	}

}


 ?>