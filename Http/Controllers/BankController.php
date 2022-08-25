<?php

namespace Modules\Bank\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Bank\DataTables\BankDataTable;
use Modules\Bank\Entities\Bank;
use Modules\Core\Helpers\HasUpload;

class BankController extends Controller
{
    use HasUpload;

    public function index(BankDataTable $dataTable)
    {
        return $dataTable->render('bank::index');
    }

    public function create()
    {
        return view('bank::create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'account_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'numeric'],
            'branch' => ['nullable', 'string', 'max:100'],
            'routing_number' => ['nullable', 'numeric'],
            'signature' => ['nullable', 'image', 'max:2048'], //2MB
            'status' => ['required', 'boolean'],
        ]);

        Bank::create([
            'signature' => $this->upload($request->file('signature')),
        ] + $validated);

        return response()->json([
            'message' => __('Bank Created Successfully'),
            'redirect' => route('admin.banks.index'),
        ]);
    }

    public function show(Bank $bank)
    {
        return view('bank::show', compact('bank'));
    }

    public function edit(Bank $bank)
    {
        return view('bank::edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'account_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'numeric'],
            'branch' => ['nullable', 'string', 'max:100'],
            'routing_number' => ['nullable', 'numeric'],
            'signature' => ['nullable', 'image', 'max:2048'], //2MB
            'status' => ['required', 'boolean'],
        ]);

        if ($request->hasFile('signature')) {
            $signature = $this->upload($request->file('signature'), $bank->signature);
        }

        $bank->update([
            'signature' => $signature ?? $bank->signature,
        ] + $validated);

        return response()->json([
            'message' => __('Bank Updated Successfully'),
            'redirect' => route('admin.banks.index'),
        ]);
    }

    public function destroy(Bank $bank)
    {
        $this->deleteFile($bank->signature);
        $bank->delete();

        return response()->json([
            'message' => __('Bank Deleted Successfully'),
        ]);
    }
}
