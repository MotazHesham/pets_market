<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClinicAppointmentRequest;
use App\Http\Requests\StoreClinicAppointmentRequest;
use App\Http\Requests\UpdateClinicAppointmentRequest;
use App\Models\Clinic;
use App\Models\ClinicAppointment;
use App\Models\ClinicService;
use App\Models\PetType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClinicAppointmentsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('clinic_appointment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ClinicAppointment::with(['service', 'clinic', 'pet_type'])->select(sprintf('%s.*', (new ClinicAppointment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'clinic_appointment_show';
                $editGate      = 'clinic_appointment_edit';
                $deleteGate    = 'clinic_appointment_delete';
                $crudRoutePart = 'clinic-appointments';

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
            $table->editColumn('client_name', function ($row) {
                return $row->client_name ? $row->client_name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });

            $table->editColumn('time', function ($row) {
                return $row->time ? $row->time : '';
            });
            $table->editColumn('age', function ($row) {
                return $row->age ? $row->age : '';
            });
            $table->addColumn('service_name', function ($row) {
                return $row->service ? $row->service->name : '';
            });

            $table->addColumn('clinic_clinic_name', function ($row) {
                return $row->clinic ? $row->clinic->clinic_name : '';
            });

            $table->addColumn('pet_type_name', function ($row) {
                return $row->pet_type ? $row->pet_type->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'service', 'clinic', 'pet_type']);

            return $table->make(true);
        }

        return view('admin.clinicAppointments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('clinic_appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = ClinicService::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clinicAppointments.create', compact('clinics', 'pet_types', 'services'));
    }

    public function store(StoreClinicAppointmentRequest $request)
    {
        $clinicAppointment = ClinicAppointment::create($request->all());

        return redirect()->route('admin.clinic-appointments.index');
    }

    public function edit(ClinicAppointment $clinicAppointment)
    {
        abort_if(Gate::denies('clinic_appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = ClinicService::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinicAppointment->load('service', 'clinic', 'pet_type');

        return view('admin.clinicAppointments.edit', compact('clinicAppointment', 'clinics', 'pet_types', 'services'));
    }

    public function update(UpdateClinicAppointmentRequest $request, ClinicAppointment $clinicAppointment)
    {
        $clinicAppointment->update($request->all());

        return redirect()->route('admin.clinic-appointments.index');
    }

    public function show(ClinicAppointment $clinicAppointment)
    {
        abort_if(Gate::denies('clinic_appointment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinicAppointment->load('service', 'clinic', 'pet_type');

        return view('admin.clinicAppointments.show', compact('clinicAppointment'));
    }

    public function destroy(ClinicAppointment $clinicAppointment)
    {
        abort_if(Gate::denies('clinic_appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinicAppointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyClinicAppointmentRequest $request)
    {
        $clinicAppointments = ClinicAppointment::find(request('ids'));

        foreach ($clinicAppointments as $clinicAppointment) {
            $clinicAppointment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
