<?php

class DashboardController
{
	public function index()
	{
		//db connection
		
		require 'app/Views/dashboard.view.php';
	}

	public function create() {
		require 'app/Views/create.view.php';
	}
	public function update() {
		require 'app/Views/create.view.php';
	}

	public function edit() {
		require 'app/Views/edit.view.php';
	}
}

