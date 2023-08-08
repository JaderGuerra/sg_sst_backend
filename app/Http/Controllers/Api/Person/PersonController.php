<?php

namespace App\Http\Controllers\Api\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\CreatePersonRequest;
use App\Http\Requests\Person\UpdatePersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = Person::paginate();
        return $persons;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePersonRequest $request)
    {
        $data = $request->validated();
        $person = Person::create($data);
        return $person;
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return $person;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $person->fill( $request->validated() );
        $person->save();
        return $person;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return $person;
    }
}
