<?php

namespace lib;

/**
 * Class to handle the items' model
 */
class Items extends TableClass
{
	const TABLE = 'items';
	const FIELDS = ['id', 'name', 'description', 'value', 'created'];

	public function __construct ($db_handler)
	{
		parent::__construct($db_handler, self::TABLE, self::FIELDS);
	}
}

