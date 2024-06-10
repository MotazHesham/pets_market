<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeliveryPetRequest;
use App\Http\Requests\StoreDeliveryPetRequest;
use App\Http\Requests\UpdateDeliveryPetRequest;
use App\Models\DeliveryPet;
use App\Models\PetType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DeliveryPetsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('delivery_pet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DeliveryPet::with(['pet_type'])->select(sprintf('%s.*', (new DeliveryPet)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'delivery_pet_show';
                $editGate      = 'delivery_pet_edit';
                $deleteGate    = 'delivery_pet_delete';
                $crudRoutePart = 'delivery-pets';

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
            $table->editColumn('from_city', function ($row) {
                return $row->from_city ? DeliveryPet::FROM_CITY_SELECT[$row->from_city] : '';
            });
            $table->editColumn('to_city', function ($row) {
                return $row->to_city ? DeliveryPet::TO_CITY_SELECT[$row->to_city] : '';
            });
            $table->editColumn('num_of_pets', function ($row) {
                return $row->num_of_pets ? $row->num_of_pets : '';
            });

            $table->addColumn('pet_type_name', function ($row) {
                return $row->pet_type ? $row->pet_type->name : '';
            });

            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'pet_type']);

            return $table->make(true);
        }

        return view('admin.deliveryPets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('delivery_pet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.deliveryPets.create', compact('pet_types'));
    }

    public function store(StoreDeliveryPetRequest $request)
    {
        $deliveryPet = DeliveryPet::create($request->all());

        return redirect()->route('admin.delivery-pets.index');
    }

    public function edit(DeliveryPet $deliveryPet)
    {
        abort_if(Gate::denies('delivery_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $deliveryPet->load('pet_type');

        return view('admin.deliveryPets.edit', compact('deliveryPet', 'pet_types'));
    }

    public function update(UpdateDeliveryPetRequest $request, DeliveryPet $deliveryPet)
    {
        $deliveryPet->update($request->all());

        return redirect()->route('admin.delivery-pets.index');
    }

    public function show(DeliveryPet $deliveryPet)
    {
        abort_if(Gate::denies('delivery_pet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryPet->load('pet_type');

        return view('admin.deliveryPets.show', compact('deliveryPet'));
    }

    public function destroy(DeliveryPet $deliveryPet)
    {
        abort_if(Gate::denies('delivery_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryPet->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeliveryPetRequest $request)
    {
        $deliveryPets = DeliveryPet::find(request('ids'));

        foreach ($deliveryPets as $deliveryPet) {
            $deliveryPet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
