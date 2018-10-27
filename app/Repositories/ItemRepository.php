<?php
/**
 * Created by PhpStorm.
 * User: paulo.telles
 * Date: 26/10/2018
 * Time: 16:10
 */

namespace App\Repositories;


use App\Item;
use App\RepositoriesContracts\ItemRepositoryInterface;
use Illuminate\Support\Collection;

class ItemRepository implements ItemRepositoryInterface
{
    public function all()
    {
        return Item::all();
    }

    public function store(array $data)
    {
        try{

            $data = $this->prepareData($data);
            Item::create($data);
            return true;

        }catch(\Exception $e) {

            return $e->getMessage();

        }
    }

    public function update(Item $item, array $data)
    {
        try{

            $data = $this->prepareData($data);
            $item->fill($data);
            $item->save();
            return true;

        }catch(\Exception $e) {

            return $e->getMessage();

        }
    }

    private function prepareData(array $data)
    {
        return Collection::make($data)->only(['name','description','vl_unitary'])->all();
    }
}