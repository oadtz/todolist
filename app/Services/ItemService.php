<?php

namespace App\Services;

use App\Item;
use MongoDB\BSON\ObjectID;

class ItemService extends Service {

    public function listPending($limit)
    {
        $item = Item::pending();

        if ($limit)
            $item->where('_id', '<', new ObjectID($limit));

        return $item->orderBy('created_at', 'desc')->limit(50)->get();
    }

    public function create($data)
    {
        return Item::create($data);
    }

    public function update($data)
    {
        if (!$item = Item::find($data['_id']))
            abort(404);
        
        $item->fill($data);
        $item->save();

        return $item;
    }


    public function delete($id)
    {
        if (!$item = Item::find($id))
            abort(404);

        return $item->delete();
    }


}