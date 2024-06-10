<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVolunteerRequest;
use App\Http\Requests\StoreVolunteerRequest;
use App\Http\Requests\UpdateVolunteerRequest;
use App\Models\Volunteer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VolunteersController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('volunteer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Volunteer::query()->select(sprintf('%s.*', (new Volunteer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'volunteer_show';
                $editGate      = 'volunteer_edit';
                $deleteGate    = 'volunteer_delete';
                $crudRoutePart = 'volunteers';

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
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? Volunteer::GENDER_SELECT[$row->gender] : '';
            });
            $table->editColumn('age', function ($row) {
                return $row->age ? Volunteer::AGE_SELECT[$row->age] : '';
            });
            $table->editColumn('experience', function ($row) {
                return $row->experience ? $row->experience : '';
            });
            $table->editColumn('fields', function ($row) {
                return $row->fields ? Volunteer::FIELDS_RADIO[$row->fields] : '';
            });
            $table->editColumn('period_time', function ($row) {
                return $row->period_time ? Volunteer::PERIOD_TIME_SELECT[$row->period_time] : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.volunteers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('volunteer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteers.create');
    }

    public function store(StoreVolunteerRequest $request)
    {
        $volunteer = Volunteer::create($request->all());

        return redirect()->route('admin.volunteers.index');
    }

    public function edit(Volunteer $volunteer)
    {
        abort_if(Gate::denies('volunteer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteers.edit', compact('volunteer'));
    }

    public function update(UpdateVolunteerRequest $request, Volunteer $volunteer)
    {
        $volunteer->update($request->all());

        return redirect()->route('admin.volunteers.index');
    }

    public function show(Volunteer $volunteer)
    {
        abort_if(Gate::denies('volunteer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteers.show', compact('volunteer'));
    }

    public function destroy(Volunteer $volunteer)
    {
        abort_if(Gate::denies('volunteer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $volunteer->delete();

        return back();
    }

    public function massDestroy(MassDestroyVolunteerRequest $request)
    {
        $volunteers = Volunteer::find(request('ids'));

        foreach ($volunteers as $volunteer) {
            $volunteer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
