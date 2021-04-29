<?php

class DashboardController
{
	
	// Method to fetch all information from the DB and display it in a HTML Table
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

	// Method used to update information from the edit view
	public function update() 
	{
		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			/* Trim Post entries and clean up against XSS */
			$id = trim(htmlentities($_POST['id']));
			$name = trim(htmlentities($_POST['name']));
			$email = trim(htmlentities($_POST['email']));
			$phone = trim(htmlentities($_POST['phone']));
			$mortgageId = trim(htmlentities($_POST['mortgage']));
			$completed = false;

			if(isset($_POST['completed'])){
				// if Checkbox has been ticked.
				$completed = true;
			}

			/* Form validation */
			if ($name == "")
			{
				$errors[] = 'Bitte geben Sie einen Namen ein!';
			}

			if ($email === '') 
			{
				$errors[] = 'Bitte geben Sie eine Email-Adresse ein!';
			}

			elseif (preg_match('/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i', $email) == false) 
			{
				$errors[] = 'Bitte geben Sie eine gültige Email-Adress ein!';
			}

			if ($phone !== '' && preg_match('^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\.\0-9]*$', $phone)) 
			{
				$errors[] = 'Bitte geben Sie eine gültige Telefonnummer ein!';
			}

			if ($mortgageId == null)
			{
				$errors[] = 'Bitte wählen Sie ein Hypo-Paket aus!';
			}

			if (sizeof($errors) == 0) // Form is valid fetch customer, update properties and send to Customer model
			{
				$customer = Customer::getById($id);

				$customer->name = $name;
				$customer->email = $email;
				$customer->phone = $phone;
				$customer->mortgageId = $mortgageId;
				$customer->completed = $completed;

				

				$customer->update();
				header('Location: dashboard');
			}
			else 
			{
				$customer = Customer::getById($_POST['id']);
				require 'app/Views/edit.view.php';
			}
		}
		else 
		{
			require 'app/Views/edit.view.php';
		}

		
	}

	// Method to edit a Customer
	public function edit() 
	{
		// Fetch objects from database
		$customer = Customer::getById($_GET['id']); 
		$mortgages = Mortgage::getAll();
		$risklevels = Risklevel::getAll();

		require 'app/Views/edit.view.php';
	}

	public function complete() 
	{
		$selected = $_POST['selected']; // list of checkboxes

		if (!empty($selected)) {
			foreach ($selected as $element)
			{
				Customer::remove((int)$element);
			}
		}

		header('Location: dashboard');
	}
}

