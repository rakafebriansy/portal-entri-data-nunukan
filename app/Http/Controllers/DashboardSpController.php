<?php

namespace App\Http\Controllers;

use App\Models\DashboardSp;
use Illuminate\Http\Request;

class DashboardSpController extends Controller
{
    public function detail($id)
    {
        $data = DashboardSp::findOrFail($id);
        return view('dashboard.sp.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = DashboardSp::findOrFail($id);
        return view('dashboard.sp.edit', compact('data'));
    }

    public function destroy($id)
    {
        $data = DashboardSp::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
