<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RoomTypeService;
use Illuminate\Http\Request;

class RoomTypeController extends Controller {

    public function __construct(RoomTypeService $roomTypeService)
    {
        $this->roomTypeService = $roomTypeService;
    }

    public function index(Request $request)
    {
        return response()->json($this->roomTypeService->getAll());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          =>  'required',
            'rate'          =>  'required|numeric|min:0',
            'inventory'     =>  'required|integer|min:0',
        ]);

        return response()->json($this->roomTypeService->store($request->all()));
    }

}