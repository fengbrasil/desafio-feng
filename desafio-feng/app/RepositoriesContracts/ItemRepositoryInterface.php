<?php
/**
 * Created by PhpStorm.
 * User: paulo.telles
 * Date: 26/10/2018
 * Time: 16:10
 */

namespace App\RepositoriesContracts;


use App\Item;
use Illuminate\Http\Request;

interface ItemRepositoryInterface
{
    public function all();

    public function store(array $data);

    public function update(Item $item, array $data);
}