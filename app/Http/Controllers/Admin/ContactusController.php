<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactuRequest;
use App\Models\Contactu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contactu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactus = Contactu::all();

        return view('admin.contactus.index', compact('contactus'));
    }

    public function destroy(Contactu $contactu)
    {
        abort_if(Gate::denies('contactu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactu->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactuRequest $request)
    {
        $contactus = Contactu::find(request('ids'));

        foreach ($contactus as $contactu) {
            $contactu->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
