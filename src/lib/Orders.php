<?php

namespace lib;

/**
 * Class to handle orders'
 */
class Orders extends TableClass
{
	const TABLE = 'orders';
	const FIELDS = ['id', 'order', 'date', 'client', 'item', 'quantity', 'created'];

	private $Clients;

	/**
	 */
	public function __construct ($db_handler)
	{
		parent::__construct($db_handler, self::TABLE, self::FIELDS);
		$this->Clients = new Clients($db_handler);
		$this->Items   = new Items($db_handler);
	}

	/**
	 *
	 * @param array $where search parameters
	 * @param bool $generate define if will be returned an array or a generator
	 */
	public function select (array $where=[], bool $generate=true)
	{
		$orders = array();
		$orders_seeds = array();

		foreach ($this->db->select($this->table, self::FIELDS, $where) as $_order)
			$orders_seeds[] = $this->db->get(self::TABLE, self::FIELDS, ['id' => $_order['id']]);

		foreach ($orders_seeds as $order)
			$orders[$order['order']] = $order; 

		foreach ($orders_seeds as $seed) {
			$item = ($this->Items)($seed['item']);
			$item->quantity = intval($seed['quantity']);
			$item->sum = $item->quantity * floatval($item->value);

			$orders[$seed['order']]['id'] = $seed['order'];

			if (!isset($orders[$seed['order']]['Client'])) // Client's node
				$orders[$seed['order']]['Client'] = ($this->Clients)($seed['client']);
	
			if (!isset($orders[$seed['order']]['Items'])) // Items' node
				$orders[$seed['order']]['Items'] = array();
			$orders[$seed['order']]['Items'][] = $item;
	
			if (!isset($orders[$seed['order']]['value']))
				$orders[$seed['order']]['value'] = 0;
			$orders[$seed['order']]['value'] += $item->sum;
		}

		sort($orders);// important

		if ($generate) // if set to return a generator
			return function () use ($orders) {
				for ($i = 0; $i < count($orders); $i++)
					yield (object)$orders[$i];
				return ;
			};
		return $orders;
	}

	/**
	 * the orders' model usa a different approach
	 */
	public function get (string $id)
	{
		if (!$this->exists('order', $id))
			return false;
		return ($this->select(['order' => $id], false))[0];
	}

}

