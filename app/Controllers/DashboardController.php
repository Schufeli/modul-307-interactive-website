<?php

class DashboardController
{
	

	public function index()
	{
		$customers = Customer::getAll();
		$mortgages = Mortgage::getAll();
		$risklevels = Risklevel::getAll();
		require 'app/Views/dashboard.view.php';
	}

	public function create() 
	{
		$mortgages = Mortgage::getAll();
		$risklevels = Risklevel::getAll();
		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$name = trim(htmlentities($_POST['name']));
			$email = trim(htmlentities($_POST['email']));
			$phone = trim(htmlentities($_POST['phone']));
			$risklevel = htmlentities($_POST['risklevel']);
			$mortgage = htmlentities($_POST['mortgage']);
			//Validation
			if ($name == "")
			{
				$errors[] = 'Bitte geben Sie einen Namen ein!';
			}
			if ($email === '') 
			{
				$errors[] = 'Bitte geben Sie eine Email-Adresse ein!';
			} 
			elseif (!preg_match("/[^@]+@[^.]+\..+$/i", $email)) 
			{
				$errors[] = 'Bitte geben Sie eine gültige Email-Adress ein!';
			}
			if ($phone != '') 
			{
				if (!preg_match("/^[0-9\-\(\)\/\+\s]+$/", $phone)) 
				{
					$errors[] = 'Bitte geben Sie eine gültige Telefonnummer ein!';
				}
			}
			if ($risklevel == null)
			{
				$errors[] = 'Bitte wählen Sie ein Risikolevel aus!';
			}
			if ($mortgage == null)
			{
				$errors[] = 'Bitte wählen Sie ein Hypo-Paket aus!';
			}
			if (sizeof($errors) == 0) 
			{
				$customer = new Customer(
					0,
					$name,
					$email,
					$phone,
					"",
					"",
					false,
					$risklevel,
					$mortgage
				);
				$customer->create();
				header('Location: dashboard');
			}
			else 
			{
				require 'app/Views/create.view.php';
			}
		}
		else 
		{
			require 'app/Views/create.view.php';
		}
	}

	public function update() 
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$risklevel = $_POST['risklevel'];
		$mortgage = $_POST['mortgage'];
	}

	public function edit() 
	{
		require 'app/Views/edit.view.php';
	}
	
	public function confirm() 
	{

	}
}

