<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMissingPetRequest;
use App\Http\Requests\StoreMissingPetRequest;
use App\Http\Requests\UpdateMissingPetRequest;
use App\Models\MissingPet;
use App\Models\PetType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MissingPetsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('missing_pet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MissingPet::with(['pet_type'])->select(sprintf('%s.*', (new MissingPet)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'missing_pet_show';
                $editGate      = 'missing_pet_edit';
                $deleteGate    = 'missing_pet_delete';
                $crudRoutePart = 'missing-pets';

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
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->addColumn('pet_type_name', function ($row) {
                return $row->pet_type ? $row->pet_type->name : '';
            });

            $table->editColumn('missing_place', function ($row) {
                return $row->missing_place ? $row->missing_place : '';
            });
            $table->editColumn('receiving_place', function ($row) {
                return $row->receiving_place ? $row->receiving_place : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'pet_type']);

            return $table->make(true);
        }

        return view('admin.missingPets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('missing_pet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.missingPets.create', compact('pet_types'));
    }

    public function store(StoreMissingPetRequest $request)
    {
        $missingPet = MissingPet::create($request->all());

        return redirect()->route('admin.missing-pets.index');
    }

    public function edit(MissingPet $missingPet)
    {
        abort_if(Gate::denies('missing_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $missingPet->load('pet_type');

        return view('admin.missingPets.edit', compact('missingPet', 'pet_types'));
    }

    public function update(UpdateMissingPetRequest $request, MissingPet $missingPet)
    {
        $missingPet->update($request->all());

        return redirect()->route('admin.missing-pets.index');
    }

    public function show(MissingPet $missingPet)
    {
        abort_if(Gate::denies('missing_pet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $missingPet->load('pet_type');

        return view('admin.missingPets.show', compact('missingPet'));
    }

    public function destroy(MissingPet $missingPet)
    {
        abort_if(Gate::denies('missing_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $missingPet->delete();

        return back();
    }

    public function massDestroy(MassDestroyMissingPetRequest $request)
    {
        $missingPets = MissingPet::find(request('ids'));

        foreach ($missingPets as $missingPet) {
            $missingPet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
