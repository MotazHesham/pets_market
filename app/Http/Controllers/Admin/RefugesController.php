<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRefugeRequest;
use App\Http\Requests\StoreRefugeRequest;
use App\Http\Requests\UpdateRefugeRequest;
use App\Models\Refuge;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RefugesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('refuge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Refuge::with(['user'])->select(sprintf('%s.*', (new Refuge)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'refuge_show';
                $editGate      = 'refuge_edit';
                $deleteGate    = 'refuge_delete';
                $crudRoutePart = 'refuges';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('cover', function ($row) {
                if ($photo = $row->cover) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('about_us', function ($row) {
                return $row->about_us ? $row->about_us : '';
            });
            $table->editColumn('photos', function ($row) {
                if ($photo = $row->photos) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'logo', 'cover', 'photos']);

            return $table->make(true);
        }

        return view('admin.refuges.index');
    }

    public function create()
    {
        abort_if(Gate::denies('refuge_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.refuges.create', compact('users'));
    }

    public function store(StoreRefugeRequest $request)
    {
        $refuge = Refuge::create($request->all());

        if ($request->input('logo', false)) {
            $refuge->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('cover', false)) {
            $refuge->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        if ($request->input('photos', false)) {
            $refuge->addMedia(storage_path('tmp/uploads/' . basename($request->input('photos'))))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $refuge->id]);
        }

        return redirect()->route('admin.refuges.index');
    }

    public function edit(Refuge $refuge)
    {
        abort_if(Gate::denies('refuge_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $refuge->load('user');

        return view('admin.refuges.edit', compact('refuge', 'users'));
    }

    public function update(UpdateRefugeRequest $request, Refuge $refuge)
    {
        $refuge->update($request->all());

        if ($request->input('logo', false)) {
            if (! $refuge->logo || $request->input('logo') !== $refuge->logo->file_name) {
                if ($refuge->logo) {
                    $refuge->logo->delete();
                }
                $refuge->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($refuge->logo) {
            $refuge->logo->delete();
        }

        if ($request->input('cover', false)) {
            if (! $refuge->cover || $request->input('cover') !== $refuge->cover->file_name) {
                if ($refuge->cover) {
                    $refuge->cover->delete();
                }
                $refuge->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($refuge->cover) {
            $refuge->cover->delete();
        }

        if ($request->input('photos', false)) {
            if (! $refuge->photos || $request->input('photos') !== $refuge->photos->file_name) {
                if ($refuge->photos) {
                    $refuge->photos->delete();
                }
                $refuge->addMedia(storage_path('tmp/uploads/' . basename($request->input('photos'))))->toMediaCollection('photos');
            }
        } elseif ($refuge->photos) {
            $refuge->photos->delete();
        }

        return redirect()->route('admin.refuges.index');
    }

    public function show(Refuge $refuge)
    {
        abort_if(Gate::denies('refuge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refuge->load('user', 'refugeRefugePets');

        return view('admin.refuges.show', compact('refuge'));
    }

    public function destroy(Refuge $refuge)
    {
        abort_if(Gate::denies('refuge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refuge->delete();

        return back();
    }

    public function massDestroy(MassDestroyRefugeRequest $request)
    {
        $refuges = Refuge::find(request('ids'));

        foreach ($refuges as $refuge) {
            $refuge->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('refuge_create') && Gate::denies('refuge_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Refuge();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
