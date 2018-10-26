<?php
/**
 * Created by PhpStorm.
 * User: paulo.telles
 * Date: 26/10/2018
 * Time: 15:44
 */

namespace App\RepositoriesContracts;


use App\Client;

interface ClientRepositoryInterface
{
    public function all();

    public function store(array $data);

    public function update(Client $client, array $data);
}