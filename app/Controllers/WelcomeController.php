<?php

class WelcomeController
{
	public function index()
	{
		$hello = 'Viel Spass beim Programmieren!';

		$customer = new Customer(1, 'simon', 'simon@test.ch', '0799007945', '', 0, 1, 20);

		$customer->create();
		
		require 'app/Views/welcome.view.php';
	}
}

