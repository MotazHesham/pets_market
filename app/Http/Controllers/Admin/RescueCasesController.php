<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRescueCaseRequest;
use App\Http\Requests\StoreRescueCaseRequest;
use App\Http\Requests\UpdateRescueCaseRequest;
use App\Models\PetType;
use App\Models\RescueCase;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RescueCasesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('rescue_case_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RescueCase::with(['pet_type'])->select(sprintf('%s.*', (new RescueCase)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'rescue_case_show';
                $editGate      = 'rescue_case_edit';
                $deleteGate    = 'rescue_case_delete';
                $crudRoutePart = 'rescue-cases';

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
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('photos', function ($row) {
                if (! $row->photos) {
                    return '';
                }
                $links = [];
                foreach ($row->photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->addColumn('pet_type_name', function ($row) {
                return $row->pet_type ? $row->pet_type->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photos', 'pet_type']);

            return $table->make(true);
        }

        return view('admin.rescueCases.index');
    }

    public function create()
    {
        abort_if(Gate::denies('rescue_case_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rescueCases.create', compact('pet_types'));
    }

    public function store(StoreRescueCaseRequest $request)
    {
        $rescueCase = RescueCase::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $rescueCase->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $rescueCase->id]);
        }

        return redirect()->route('admin.rescue-cases.index');
    }

    public function edit(RescueCase $rescueCase)
    {
        abort_if(Gate::denies('rescue_case_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rescueCase->load('pet_type');

        return view('admin.rescueCases.edit', compact('pet_types', 'rescueCase'));
    }

    public function update(UpdateRescueCaseRequest $request, RescueCase $rescueCase)
    {
        $rescueCase->update($request->all());

        if (count($rescueCase->photos) > 0) {
            foreach ($rescueCase->photos as $media) {
                if (! in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $rescueCase->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $rescueCase->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.rescue-cases.index');
    }

    public function show(RescueCase $rescueCase)
    {
        abort_if(Gate::denies('rescue_case_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rescueCase->load('pet_type');

        return view('admin.rescueCases.show', compact('rescueCase'));
    }

    public function destroy(RescueCase $rescueCase)
    {
        abort_if(Gate::denies('rescue_case_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rescueCase->delete();

        return back();
    }

    public function massDestroy(MassDestroyRescueCaseRequest $request)
    {
        $rescueCases = RescueCase::find(request('ids'));

        foreach ($rescueCases as $rescueCase) {
            $rescueCase->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('rescue_case_create') && Gate::denies('rescue_case_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RescueCase();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
