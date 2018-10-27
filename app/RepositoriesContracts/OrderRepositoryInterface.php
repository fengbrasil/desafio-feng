<?php
/**
 * Created by PhpStorm.
 * User: paulo.telles
 * Date: 26/10/2018
 * Time: 15:12
 */
namespace App\RepositoriesContracts;

interface OrderRepositoryInterface
{
    public function all($filters = null);

    public function store(array $data);
}