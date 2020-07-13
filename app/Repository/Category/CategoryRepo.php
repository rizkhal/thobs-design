<?php

namespace App\Repository\Category;

interface CategoryRepo
{

	/**
	 * List all category
	 * 
	 * @return ?object
	 */
	public function all(): ?object;

	/**
	 * Category Has Project
	 * 
	 * @param  object  $data
	 * @return ?object
	 */
	public function hasProject(object $data): ?object;

	/**
	 * Save into database
	 * 
	 * @param  array  $data
	 * @return ?object
	 */
	public function save(array $data): ?object;

	/**
	 * Handle select2 request
	 * 
	 * @param  string $param
	 * @return array
	 */
	public function searchByName(array $param): array;

	/**
	 * Get category for where id
	 * 
	 * @param  string $id
	 * @return ?object
	 */
	public function edit(string $id): ?object;

	/**
	 * Delete category
	 * 
	 * @param  string $id
	 * @return bool
	 */
	public function delete(string $id): bool;

}
