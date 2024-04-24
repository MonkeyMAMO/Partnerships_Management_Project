<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParModel;

class ParController extends Controller
{
    // Method for displaying a list of records
    public function index(Request $request)
    {
        // Check if 'recherche' input is provided and not empty
        if ($request->has('recherche') && !empty($request->recherche)) {
            // Use the 'recherche' input value to filter records
            $searchTerm = $request->recherche . '%';

            // Use the concatenated value to filter records
            $records = ParModel::where('date', 'like', $searchTerm)->get();
        } else {
            // If 'recherche' input is not provided or empty, fetch all records
            $records = ParModel::all();
        }

        return view('components.list', ['records' => $records]);
    }


    // Method for displaying a form to create a new record
    public function create()
    {
        return view('components.create');
    }

    // Method for storing a newly created record in the database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'partners' => 'required',
            'subject' => 'required',
            'date' => 'required|date',
            'status' => 'required|string',
            'amount' => 'nullable|numeric',
            'extension' => 'nullable|numeric|max:100', // Adjust the maximum value as needed
        ]);

        // Find the last record in the table
        $lastRecord = ParModel::latest()->first();

        // Determine the ID for the new record
        $newId = $lastRecord ? $lastRecord->id + 1 : 1;

        // Create a new partnership record in the database
        $record = new ParModel();
        $record->id = $newId;
        $record->partners = $validatedData['partners'];
        $record->subject = $validatedData['subject'];
        $record->date = $validatedData['date'];
        $record->status = $validatedData['status'];
        $record->amount = $validatedData['amount'];
        $record->extension = $validatedData['extension'];
        $record->save();

        // Redirect to a success page or return a response
        return redirect()->route('par.index')->with('success', 'Record created successfully!');
    }




    // Method for displaying a form to edit a specific record
    public function edit($id)
    {
        $record = ParModel::findOrFail($id);
        return view('components.edit', compact('record'));
    }


    // Method for updating a specific record in the database
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'partners' => 'required|string',
            'subject' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|string',
            'amount' => 'nullable|numeric',
            'extension' => 'nullable|integer',
        ]);

        // Find the record by ID and update it with the validated data
        $record = ParModel::findOrFail($id);
        $record->update($validatedData);
        // Redirect to a success page or return a response
        return redirect()->route('par.index')->with('success', 'Record updated successfully!');
    }

    // Method for deleting a specific record from the database
    public function destroy($id)
    {
        // Find the record by ID
        $record = ParModel::findOrFail($id);

        // Get the ID of the record to be deleted
        $deletedId = $record->id;

        // Delete the record
        $record->delete();

        // Retrieve all records except the one that was deleted
        $remainingRecords = ParModel::where('id', '<>', $deletedId)->orderBy('id')->get();

        // Reorder the IDs of the remaining records
        $newId = 1;
        foreach ($remainingRecords as $remainingRecord) {
            $remainingRecord->id = $newId;
            $remainingRecord->save();
            $newId++;
        }

        // Redirect to a success page or return a response
        return redirect()->route('par.index')->with('success', 'Record deleted successfully!');
    }

}
