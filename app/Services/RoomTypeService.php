<?php

namespace App\Services;

use App\RoomType;

class RoomTypeService extends Service {

    public function getAll()
    {
        return RoomType::all();
    }

    public function store($data)
    {
        return RoomType::create($data);
    }

}