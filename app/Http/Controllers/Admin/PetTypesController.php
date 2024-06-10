<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPetTypeRequest;
use App\Http\Requests\StorePetTypeRequest;
use App\Http\Requests\UpdatePetTypeRequest;
use App\Models\PetType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PetTypesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pet_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PetType::query()->select(sprintf('%s.*', (new PetType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pet_type_show';
                $editGate      = 'pet_type_edit';
                $deleteGate    = 'pet_type_delete';
                $crudRoutePart = 'pet-types';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.petTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pet_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petTypes.create');
    }

    public function store(StorePetTypeRequest $request)
    {
        $petType = PetType::create($request->all());

        return redirect()->route('admin.pet-types.index');
    }

    public function edit(PetType $petType)
    {
        abort_if(Gate::denies('pet_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petTypes.edit', compact('petType'));
    }

    public function update(UpdatePetTypeRequest $request, PetType $petType)
    {
        $petType->update($request->all());

        return redirect()->route('admin.pet-types.index');
    }

    public function show(PetType $petType)
    {
        abort_if(Gate::denies('pet_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petType->load('petTypeClinics');

        return view('admin.petTypes.show', compact('petType'));
    }

    public function destroy(PetType $petType)
    {
        abort_if(Gate::denies('pet_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petType->delete();

        return back();
    }

    public function massDestroy(MassDestroyPetTypeRequest $request)
    {
        $petTypes = PetType::find(request('ids'));

        foreach ($petTypes as $petType) {
            $petType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
