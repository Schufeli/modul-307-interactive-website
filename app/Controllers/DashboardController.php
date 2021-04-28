<?php

class DashboardController
{
	public function index()
	{
		$customer = Customer::getAll();
		require 'app/Views/dashboard.view.php';
	}

	public function create() 
	{
		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$name = trim($_POST['name']);
			$email = trim($_POST['email']);
			$phone = trim($_POST['phone']);
			$risklevel = $_POST['risklevel'];
			$mortgage = $_POST['mortgage'];
			//TODO: (Validation)
			if ($name == "")
			{
				$errors[] = 'Bitte geben Sie einen Namen ein!';
			}
			if ($email === '') 
			{
				$errors[] = 'Bitte geben Sie eine Email-Adresse ein!';
			} 
			elseif (preg_match("/[^@]+@[^.]+\..+$/i", $email) == false) 
			{
				$errors[] = 'Bitte geben Sie eine gültige Email-Adress ein!';
			}
			if (preg_match('/(0|\+?\d{2})(\d{7,8})/', $phone)) 
			{
				$errors[] = 'Bitte geben Sie eine gültige Telefonnummer ein!';
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
				$customer->create(
					$name,
					$email,
					$phone,
					$risklevel,
					$mortgage
				);
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

