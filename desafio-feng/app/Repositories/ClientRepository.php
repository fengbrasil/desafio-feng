<?php
/**
 * Created by PhpStorm.
 * User: paulo.telles
 * Date: 26/10/2018
 * Time: 15:45
 */

namespace App\Repositories;


use App\Client;
use App\RepositoriesContracts\ClientRepositoryInterface;
use Illuminate\Support\Collection;

class ClientRepository implements ClientRepositoryInterface
{
    public function all()
    {
        return Client::all();
    }

    public function store(array $data)
    {
        try {
            $data = $this->prepareData($data);
            Client::create($data);
            return true;
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Client $client, array $data)
    {
        try {
            $data = $this->prepareData($data);
            $client->fill($data);
            $client->save();

            return true;
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    private function prepareData(array $data)
    {
        return Collection::make($data)->only(['name','email','phone'])->all();
    }

}