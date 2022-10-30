<?php

namespace App\Http\Controllers;

use App\Models\WorkerInfoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WorkerInfoController extends Controller
{
    public function list_workers_view(WorkerInfoModel $worker_info) {

        return view('workers/list_of_workers', [
            'workers' => $worker_info::all(),
        ]);
    }

    public function add_worker_view() {

        return view('workers/add_worker');
    }

    public function edit_worker_view($id, WorkerInfoModel $worker_info) {
        $worker = $worker_info->where('id', $id)->get()->first();

        return view('workers/edit_worker', [
            'worker' => $worker,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10'
        ]);

        $worker = new WorkerInfoModel();

        if (DB::table('worker_info')->where('phone', $request->phone)->exists()) {
            return redirect::back()->with('error', 'Вече съществува работник с номер '.$request->phone);
        }

        $worker->name = $request->name;
        $worker->phone = $request->phone;
        $worker->save();

        return redirect::back()->with('success', $worker->name.' е добавен към списъка с работници');

    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10'
        ]);

        $worker = WorkerInfoModel::find($id);

        if (DB::table('worker_info')->where('phone')->exists()) {
            return redirect::back()->with('error', 'Вече съществува работник с този номер '.$worker->phone);
        }

        $worker->name = $request->name;
        $worker->phone = $request->phone;
        $worker->update();

        return redirect::back()->with('success', 'Успешно променихте работника.');
    }

    public function destroy($id) {
        $worker = WorkerInfoModel::find($id);
        $worker->delete();

        return redirect::back()->with('success', 'Успешно изтрихте работника.');
    }
}
