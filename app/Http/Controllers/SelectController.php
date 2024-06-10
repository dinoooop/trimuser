<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SelectController extends Controller
{

    public function regular()
    {
        $data = [
            'status' => status(),
            'user_status' => status(null, 'user'),
            'module_status' => status(null, 'module'),
            'gender' => gender(),
            'roles' => role(),
            'weekdays' => weekday(),
            'months' => month(),
        ];

        return response()->json($data);

    }

    public function auto(Request $request, $item)
    {

        switch ($item) {
            case 'countries':
                $query = Country::query();
                break;

            default:
                return response()->json([], 404);
        }

        if ($request->filled('ids')) {
            $data = $query->whereIn('id', $request->ids)->get();
            return response()->json($data);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $data = $query->orderBy('name', 'asc')->limit(10)->get();
        return response()->json($data);
    }
}