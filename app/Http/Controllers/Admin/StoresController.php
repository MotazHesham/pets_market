<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStoreRequest;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StoresController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('store_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Store::with(['user'])->select(sprintf('%s.*', (new Store)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'store_show';
                $editGate      = 'store_edit';
                $deleteGate    = 'store_delete';
                $crudRoutePart = 'stores';

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

            $table->editColumn('store_name', function ($row) {
                return $row->store_name ? $row->store_name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
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

            $table->rawColumns(['actions', 'placeholder', 'user', 'logo']);

            return $table->make(true);
        }

        return view('admin.stores.index');
    }

    public function create()
    {
        abort_if(Gate::denies('store_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreStoreRequest $request)
    {
        $store = Store::create($request->all());

        if ($request->input('logo', false)) {
            $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('cover', false)) {
            $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $store->id]);
        }

        return redirect()->route('admin.stores.index');
    }

    public function edit(Store $store)
    {
        abort_if(Gate::denies('store_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $store->load('user');

        return view('admin.stores.edit', compact('store', 'users'));
    }

    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->all());

        if ($request->input('logo', false)) {
            if (! $store->logo || $request->input('logo') !== $store->logo->file_name) {
                if ($store->logo) {
                    $store->logo->delete();
                }
                $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($store->logo) {
            $store->logo->delete();
        }

        if ($request->input('cover', false)) {
            if (! $store->cover || $request->input('cover') !== $store->cover->file_name) {
                if ($store->cover) {
                    $store->cover->delete();
                }
                $store->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($store->cover) {
            $store->cover->delete();
        }

        return redirect()->route('admin.stores.index');
    }

    public function show(Store $store)
    {
        abort_if(Gate::denies('store_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->load('user');

        return view('admin.stores.show', compact('store'));
    }

    public function destroy(Store $store)
    {
        abort_if(Gate::denies('store_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->delete();

        return back();
    }

    public function massDestroy(MassDestroyStoreRequest $request)
    {
        $stores = Store::find(request('ids'));

        foreach ($stores as $store) {
            $store->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('store_create') && Gate::denies('store_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Store();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
