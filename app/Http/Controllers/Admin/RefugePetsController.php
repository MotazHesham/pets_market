<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRefugePetRequest;
use App\Http\Requests\StoreRefugePetRequest;
use App\Http\Requests\UpdateRefugePetRequest;
use App\Models\Refuge;
use App\Models\RefugePet;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RefugePetsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('refuge_pet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RefugePet::with(['refuge'])->select(sprintf('%s.*', (new RefugePet)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'refuge_pet_show';
                $editGate      = 'refuge_pet_edit';
                $deleteGate    = 'refuge_pet_delete';
                $crudRoutePart = 'refuge-pets';

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
            $table->addColumn('refuge_address', function ($row) {
                return $row->refuge ? $row->refuge->address : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'refuge', 'photo']);

            return $table->make(true);
        }

        return view('admin.refugePets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('refuge_pet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refuges = Refuge::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.refugePets.create', compact('refuges'));
    }

    public function store(StoreRefugePetRequest $request)
    {
        $refugePet = RefugePet::create($request->all());

        if ($request->input('photo', false)) {
            $refugePet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $refugePet->id]);
        }

        return redirect()->route('admin.refuge-pets.index');
    }

    public function edit(RefugePet $refugePet)
    {
        abort_if(Gate::denies('refuge_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refuges = Refuge::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $refugePet->load('refuge');

        return view('admin.refugePets.edit', compact('refugePet', 'refuges'));
    }

    public function update(UpdateRefugePetRequest $request, RefugePet $refugePet)
    {
        $refugePet->update($request->all());

        if ($request->input('photo', false)) {
            if (! $refugePet->photo || $request->input('photo') !== $refugePet->photo->file_name) {
                if ($refugePet->photo) {
                    $refugePet->photo->delete();
                }
                $refugePet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($refugePet->photo) {
            $refugePet->photo->delete();
        }

        return redirect()->route('admin.refuge-pets.index');
    }

    public function show(RefugePet $refugePet)
    {
        abort_if(Gate::denies('refuge_pet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refugePet->load('refuge');

        return view('admin.refugePets.show', compact('refugePet'));
    }

    public function destroy(RefugePet $refugePet)
    {
        abort_if(Gate::denies('refuge_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refugePet->delete();

        return back();
    }

    public function massDestroy(MassDestroyRefugePetRequest $request)
    {
        $refugePets = RefugePet::find(request('ids'));

        foreach ($refugePets as $refugePet) {
            $refugePet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('refuge_pet_create') && Gate::denies('refuge_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RefugePet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
