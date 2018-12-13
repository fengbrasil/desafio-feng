<?php

namespace lib;

/**
 * Class to handle the client's model *
 */
class Clients extends TableClass
{
	const TABLE = 'clients';
	const FIELDS = ['id', 'name', 'email', 'phone', 'created'];

	public function __construct ($db_handler)
	{
		parent::__construct($db_handler, self::TABLE, self::FIELDS);
	}
}

