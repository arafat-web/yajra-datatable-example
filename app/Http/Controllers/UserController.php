<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" value=' . $row->id . ' class="view me-2 btn btn-primary btn-sm">View</a><a href="javascript:void(0)" value=' . $row->id . ' class="edit btn btn-warning me-2 btn-sm">Edit</a><a href="javascript:void(0)" value=' . $row->id . ' class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('users');
    }

    public function view(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('view', compact('data'))->render()
            ]);
        }

    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('edit', compact('data'))->render()
            ]);
        }

    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        return response()->json([
            'status' => true,
        ]);
    }
}
