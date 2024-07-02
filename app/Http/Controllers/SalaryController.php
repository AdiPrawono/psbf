<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    private $salaries;

    public function __construct()
    {
        $this->middleware('auth');

        $this->salaries = resolve(Salary::class);
    }

    public function index()
    {
        $salaries = $this->salaries->paginate();

        return view('pages.salaries', compact('salaries'));
    }

    public function create()
    {
        return view('pages.salaries_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'salary' => 'required|numeric'
        ]);

        $this->salaries->create([
            'employee_id' => $request->input('employee_id'),
            'salary' => $request->input('salary')
        ]);

        return redirect()->route('salaries.index')->with('status', 'Successfully created a salary record.');
    }

    public function show(Salary $salary)
    {
        $salary->load('employee');

        return view('pages.salaries_show', compact('salary'));
    }

    public function send(Request $request, $id)
    {
        // Retrieve the salary based on the $id
        $salary = Salary::findOrFail($id);

        $salary->update(['status' => 'terkirim']);

        return redirect()->route('salaries')->with('status', 'Berhasil mengirim gaji.');
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'salary' => 'required|numeric'
        ]);

        $this->salaries->where('id', $salary->id)
            ->update([
                'salary' => $request->input('salary')
            ]);

        return redirect()->route('salaries.index')->with('status', 'Successfully updated salary record.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->route('salaries.index')->with('status', 'Successfully deleted salary record.');
    }

    public function print()
    {
        $salaries = Salary::with('employee')->latest()->get();

        return view('pages.salaries_print', compact('salaries'));
    }
}
