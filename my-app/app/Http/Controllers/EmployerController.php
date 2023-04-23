<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::all();
        // return view('employers.index', compact('employers'));
        return response()->json($employers);
    }

    public function create()
    {
        return view('employers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employers',
            'password' => 'required|min:8',
            'company' => 'required',
        ]);

        $employer = Employer::create($request->all());
        return redirect()->route('employers.index')->with('success', 'Employer created successfully');
    }

    public function show(Employer $employer)
    {
        return view('employers.show', compact('employer'));
    }

    public function edit(Employer $employer)
    {
        return view('employers.edit', compact('employer'));
    }

    public function update(Request $request, Employer $employer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'company' => 'required',
        ]);

        $employer->update($request->all());
        return redirect()->route('employers.index')->with('success', 'Employer updated successfully');
    }

    public function destroy(Employer $employer)
    {
        $employer->delete();
        return redirect()->route('employers.index')->with('success', 'Employer deleted successfully');
    }
}