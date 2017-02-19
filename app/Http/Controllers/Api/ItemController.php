<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller {

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(Request $request)
    {
        return response()->json($this->itemService->query($request->input('is_done'), $request->input('limit')));
    }

    public function store(Request $request)
    {
        if ($request->input('_id'))
            return response()->json($this->itemService->update($request->all()));


        return response()->json($this->itemService->create($request->all()));
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->itemService->setDone($id, $request->input('status')));
    }

    public function destroy(Request $request, $id)
    {
        return response()->json($this->itemService->delete($id));
    }

}