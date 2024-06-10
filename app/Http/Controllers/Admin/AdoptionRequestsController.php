<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdoptionRequestRequest;
use App\Http\Requests\StoreAdoptionRequestRequest;
use App\Http\Requests\UpdateAdoptionRequestRequest;
use App\Models\AdoptionRequest;
use App\Models\RefugePet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AdoptionRequestsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('adoption_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AdoptionRequest::with(['refuge_pet'])->select(sprintf('%s.*', (new AdoptionRequest)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'adoption_request_show';
                $editGate      = 'adoption_request_edit';
                $deleteGate    = 'adoption_request_delete';
                $crudRoutePart = 'adoption-requests';

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
            $table->addColumn('refuge_pet_name', function ($row) {
                return $row->refuge_pet ? $row->refuge_pet->name : '';
            });

            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? AdoptionRequest::GENDER_RADIO[$row->gender] : '';
            });
            $table->editColumn('age', function ($row) {
                return $row->age ? AdoptionRequest::AGE_SELECT[$row->age] : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'refuge_pet']);

            return $table->make(true);
        }

        return view('admin.adoptionRequests.index');
    }

    public function create()
    {
        abort_if(Gate::denies('adoption_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refuge_pets = RefugePet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.adoptionRequests.create', compact('refuge_pets'));
    }

    public function store(StoreAdoptionRequestRequest $request)
    {
        $adoptionRequest = AdoptionRequest::create($request->all());

        return redirect()->route('admin.adoption-requests.index');
    }

    public function edit(AdoptionRequest $adoptionRequest)
    {
        abort_if(Gate::denies('adoption_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refuge_pets = RefugePet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $adoptionRequest->load('refuge_pet');

        return view('admin.adoptionRequests.edit', compact('adoptionRequest', 'refuge_pets'));
    }

    public function update(UpdateAdoptionRequestRequest $request, AdoptionRequest $adoptionRequest)
    {
        $adoptionRequest->update($request->all());

        return redirect()->route('admin.adoption-requests.index');
    }

    public function show(AdoptionRequest $adoptionRequest)
    {
        abort_if(Gate::denies('adoption_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adoptionRequest->load('refuge_pet');

        return view('admin.adoptionRequests.show', compact('adoptionRequest'));
    }

    public function destroy(AdoptionRequest $adoptionRequest)
    {
        abort_if(Gate::denies('adoption_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adoptionRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdoptionRequestRequest $request)
    {
        $adoptionRequests = AdoptionRequest::find(request('ids'));

        foreach ($adoptionRequests as $adoptionRequest) {
            $adoptionRequest->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
