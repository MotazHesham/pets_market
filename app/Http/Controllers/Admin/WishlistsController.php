<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWishlistRequest;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WishlistsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wishlist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wishlists = Wishlist::with(['product', 'user'])->get();

        return view('admin.wishlists.index', compact('wishlists'));
    }

    public function create()
    {
        abort_if(Gate::denies('wishlist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.wishlists.create', compact('products', 'users'));
    }

    public function store(StoreWishlistRequest $request)
    {
        $wishlist = Wishlist::create($request->all());

        return redirect()->route('admin.wishlists.index');
    }

    public function edit(Wishlist $wishlist)
    {
        abort_if(Gate::denies('wishlist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wishlist->load('product', 'user');

        return view('admin.wishlists.edit', compact('products', 'users', 'wishlist'));
    }

    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        $wishlist->update($request->all());

        return redirect()->route('admin.wishlists.index');
    }

    public function show(Wishlist $wishlist)
    {
        abort_if(Gate::denies('wishlist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wishlist->load('product', 'user');

        return view('admin.wishlists.show', compact('wishlist'));
    }

    public function destroy(Wishlist $wishlist)
    {
        abort_if(Gate::denies('wishlist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wishlist->delete();

        return back();
    }

    public function massDestroy(MassDestroyWishlistRequest $request)
    {
        $wishlists = Wishlist::find(request('ids'));

        foreach ($wishlists as $wishlist) {
            $wishlist->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
