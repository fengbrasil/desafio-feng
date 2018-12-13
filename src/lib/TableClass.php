<?php

namespace lib;

/**
 * Reference class for models
 */
class TableClass
{
	public $db;
	public $table;
	public $fields;
	public $errors = [];

	public function __construct ($db_handler, $table, $fields)
	{
		$this->db = $db_handler;
		$this->table = $table;
		$this->fields = $fields;
	}

	public function __invoke ($id)
	{
		return $this->get($id);
	}

	public function get (string $id)
	{
		$data = $this->db->get($this->table, $this->fields, ['id' => $id]);
		return (object)$data;
	}

	/**
	 * check if an element exists
	 */
	public function exists (string $key, string $value): bool
	{
		return $this->db->has($this->table, [$key => $value]) ? true : false;
	}

	/**
	 * yet to implement
	 */
	public function errors ()
	{
		return $this->errors;
	}

	public function delete ($id)
	{
		if (!$this->get($id))
			return false;
		return $this->db->delete($this->table, ['id' => $id]);
	}

}
