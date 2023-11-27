<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index() {
        $staffs = User::where('role', 0)->paginate();
        return response()->json($staffs);
    }

    public function store(Request $request) {
        $staff = User::create($request->all());

        return response(json_encode($staff), 201);
    }

    public function update(Request $request, User $staff) {
        $staff->update($request->all());

        return response(json_encode($staff), 200);
    }

    public function show(User $staff) {
        return response(json_encode($staff), 200);
    }

    public function destroy(User $staff) {
        $staff->delete();

        return response('', 204);
    }
}
