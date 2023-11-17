<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\RequestForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function getForms(Request $request) {
        $request->validate([
            'id' => 'required',
        ]);
        $employeeId = $request->input('id');

        $forms = DB::table('request_form')->where('sender_id', $employeeId)->get()->toArray();

        $data = [];
        foreach ($forms as $form) {
            $data[] = [
                'id' => $form->id,
                'reason' => $form->reason,
                'start_date' => date('d/m/Y', strtotime($form->start_date)),
                'end_date' => date('d/m/Y', strtotime($form->end_date)),
                'status' => $form->status,
            ];
        }

        return response(json_encode($data));
    }

    public function getManagerForms(Request $request) {
        $request->validate([
            'id' => 'required',
        ]);
        $employeeId = $request->input('id');

        $employee = User::where('id', $employeeId)->first();

        $forms = DB::table('request_form')->where('manager_id', $employee->id)->get()->toArray();

        $data = [];
        foreach ($forms as $form) {
            $data[] = [
                'id' => $form->id,
                'employee_name' => DB::table('users')->where('id', $form->sender_id)->get('name')[0]->name,
                'reason' => $form->reason,
                'start_date' => date('d/m/Y', strtotime($form->start_date)),
                'end_date' => date('d/m/Y', strtotime($form->end_date)),
                'status' => $form->status,
            ];
        }

        return response(json_encode($data));
    }

    public function postForms(Request $request) {
        $request->validate([
            'request_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'employee_id' => 'required',
            'reason' => 'nullable',
        ]);
        $employee = User::where('id', $request->employee_id)->first();

        if ($request->request_type == 'unexpected') {
            DB::table('request_form')->insert([
                'type' => 'unexpected',
                'sender_id' => $request->employee_id,
                'manager_id' => $employee->manager->id,
                'start_date' => date_create($request->input('start_date')),
                'end_date' => date_create($request->input('end_date')),
                'reason' => $request->input('reason'),
            ]);

            return response('Da gui form thanh cong', 201);
        }
        $startDate = date_create($request->input('start_date'));
        $endDate = date_create($request->input('end_date'));
        $totalDays = date_diff($endDate, $startDate, true)->days;

        $remainingDays = $employee->remaining_day;

        if ($remainingDays < $totalDays) {
            return response('So ngay con lai khong du', 202);
        }

        DB::table('request_form')->insert([
            'type' => 'expected',
            'sender_id' => $request->employee_id,
            'manager_id' => $employee->manager->id,
            'start_date' => date_create($request->input('start_date')),
            'end_date' => date_create($request->input('end_date')),
            'reason' => $request->input('reason'),
        ]);

        return response('Da gui form thanh cong', 201);
    }

    public function postManagerForms(Request $request) {
        $request->validate([
            'form_id' => 'required',
            'type' => 'required',
            'reason' => 'nullable',
        ]);
        $formId = $request->form_id;

        $form = RequestForm::where('id', $formId)->first();

        $result = $request->type;

        if ($result == 'reject') {
            DB::table('request_form')->where('id', $formId)
                ->update([
                    'status' => $request->type,
                    'manager_reason' => $request->reason,
                ]);

            return response('Da reject thanh cong', 201);
        }

        if ($form->type == 'unexpected') {
            DB::table('request_form')->where('id', $formId)
                ->update([
                    'status' => 'accepted',
                ]);

            return response('Da accpet thanh cong', 201);
        }

        $startDate = date_create($form->start_date);
        $endDate = date_create($form->end_date);
        $totalDays = date_diff($endDate, $startDate, true)->days;

        $employeeId = $form->sender_id;

        $employee = User::where('id', $employeeId)->first();

        $employeeRemainingDays = $employee->remaining_day;

        if ($employeeRemainingDays > $totalDays) {
            DB::table('users')->where('id', $employee->id)
                ->update([
                    'remaining_day'=> $employeeRemainingDays - $totalDays,
                ]);

            DB::table('request_form')->where('id', $formId)
                ->update([
                    'status' => 'accepted',
                ]);

            return response('Da accpet thanh cong', 201);
        }

        return response('So ngay con lai khong du', 202);
    }
}
