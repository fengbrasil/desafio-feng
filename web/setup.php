<?php
/**
 * Project database setup
 */
call_user_func(function () use ($container) {
	$schema_file = __LOCAL__.'schema.sql';
	$database_file = __VAR__.'database.db';

	if (filesize($database_file) > 10000) 
		return true;

	if (!file_exists($schema_file))
		_pre('Database schema file does not exists');

	$queries = explode(';', file_get_contents($schema_file));
	$database = $container['database'];
	foreach ($queries as $query)
		$database->query($query.';');
	
	$clients_seed = array(
		['id' => 1, 'name' => 'João da Silva', 'email' => 'joao.silva@email.com', 'phone' => '(21)9999-9999'],
		['id' => 7, 'name' => 'Matheus Andrade', 'email' => 'matheus@email.com', 'phone' => '(21)7890-1234'],
		['id' => 10, 'name' => 'Marco Moraes', 'email' => 'marco@email.com', 'phone' => '(21)3245-7609']
	);

	$items_seed = array(
		['id' => 1, 'name' => 'Combo 01', 'description' => 'Cachorro Quente + Refrigerante', 'value' => 15.00],
		['id' => 2, 'name' => 'Combo 02', 'description' => 'Hamburguer + Fritas', 'value' => 10.00],
		['id' => 3, 'name' => 'Refrigerante 350ml', 'description' => 'Latinha de refrigerante 350ml', 'value' => 5.00],
		['id' => 4, 'name' => 'Pipoca Grade', 'description' => 'Balde de pipoca amanteigada', 'value' => 12.00],
	);

	$orders_seed = array(
		['id' => 1, 'order' => 1, 'date' => '2018-10-10 18:32:06', 'client' => 1, 'item' => 1, 'quantity' => 3],
		['id' => 2, 'order' => 1, 'date' => '2018-10-10 18:32:06', 'client' => 1, 'item' => 2, 'quantity' => 2],
		['id' => 3, 'order' => 2, 'date' => '2018-10-12 17:15:32', 'client' => 7, 'item' => 1, 'quantity' => 10],
		['id' => 4, 'order' => 3, 'date' => '2018-10-12 19:00:10', 'client' => 10, 'item' => 3, 'quantity' => 2],
		['id' => 5, 'order' => 3, 'date' => '2018-10-12 19:00:10', 'client' => 10, 'item' => 4, 'quantity' => 1],
	);

	//
	$apply_created_date = function ($s) {
		for ($i = 0; $i < count($s); $i++)
			$s[$i]['created'] = date('Y-m-d H:i:s');
		return $s;
	};

	$database->insert('clients', $apply_created_date($clients_seed));
	$database->insert('items', $apply_created_date($items_seed));
	$database->insert('orders', $apply_created_date($orders_seed));

	_pre('Database configured', false);

});
