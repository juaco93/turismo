<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Alojamiento\BulkDestroyAlojamiento;
use App\Http\Requests\Admin\Alojamiento\DestroyAlojamiento;
use App\Http\Requests\Admin\Alojamiento\IndexAlojamiento;
use App\Http\Requests\Admin\Alojamiento\StoreAlojamiento;
use App\Http\Requests\Admin\Alojamiento\UpdateAlojamiento;
use App\Models\Alojamiento;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AlojamientosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAlojamiento $request
     * @return array|Factory|View
     */
    public function index(IndexAlojamiento $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Alojamiento::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'direccion', 'ciudad', 'departamento', 'provincia', 'telefono', 'web', 'email', 'tipo'],

            // set columns to searchIn
            ['id', 'nombre', 'direccion', 'ciudad', 'departamento', 'provincia', 'telefono', 'web', 'email', 'tipo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.alojamiento.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.alojamiento.create');

        return view('admin.alojamiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlojamiento $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAlojamiento $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Alojamiento
        $alojamiento = Alojamiento::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/alojamientos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/alojamientos');
    }

    /**
     * Display the specified resource.
     *
     * @param Alojamiento $alojamiento
     * @throws AuthorizationException
     * @return void
     */
    public function show(Alojamiento $alojamiento)
    {
        $this->authorize('admin.alojamiento.show', $alojamiento);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Alojamiento $alojamiento
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Alojamiento $alojamiento)
    {
        $this->authorize('admin.alojamiento.edit', $alojamiento);


        return view('admin.alojamiento.edit', [
            'alojamiento' => $alojamiento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAlojamiento $request
     * @param Alojamiento $alojamiento
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAlojamiento $request, Alojamiento $alojamiento)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Alojamiento
        $alojamiento->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/alojamientos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/alojamientos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAlojamiento $request
     * @param Alojamiento $alojamiento
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAlojamiento $request, Alojamiento $alojamiento)
    {
        $alojamiento->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAlojamiento $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAlojamiento $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Alojamiento::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function getAlojamientos(){
        return Alojamiento::all();
    }
}
