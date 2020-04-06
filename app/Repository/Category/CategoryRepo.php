<?php

namespace App\Repository\Category;

interface CategoryRepo {

	/**
	 * List all category
	 * @return object
	 */
	public function all();

	public function hasProject(object $data);

	/**
	 * Save into database
	 * @param  array  $data
	 * @return [type]
	 */
	public function save(array $data);

	/**
	 * Handle select2 request
	 * @param  string $param
	 * @return [type]
	 */
	public function searchByName(array $param);

}