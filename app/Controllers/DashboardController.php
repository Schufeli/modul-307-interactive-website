<?php

class DashboardController
{
	public function index()
	{
		require 'app/Views/dashboard.view.php';
	}

	public function create() {

	}
	public function update() {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$risklevel = $_POST['risklevel'];
		$mortgage = $_POST['mortgage'];
	}
	public function edit() {
		require 'app/Views/edit.view.php';
	}
	public function confirm() {

	}
}

