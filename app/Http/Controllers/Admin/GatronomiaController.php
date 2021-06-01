<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gatronomium\BulkDestroyGatronomium;
use App\Http\Requests\Admin\Gatronomium\DestroyGatronomium;
use App\Http\Requests\Admin\Gatronomium\IndexGatronomium;
use App\Http\Requests\Admin\Gatronomium\StoreGatronomium;
use App\Http\Requests\Admin\Gatronomium\UpdateGatronomium;
use App\Models\Gatronomium;
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

class GatronomiaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGatronomium $request
     * @return array|Factory|View
     */
    public function index(IndexGatronomium $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Gatronomium::class)->processRequestAndGet(
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

        $datos = Gatronomium::all();

        return $datos;
        return view('admin.gatronomium.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.gatronomium.create');

        return view('admin.gatronomium.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGatronomium $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGatronomium $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Gatronomium
        $gatronomium = Gatronomium::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/gatronomia'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/gatronomia');
    }

    /**
     * Display the specified resource.
     *
     * @param Gatronomium $gatronomium
     * @throws AuthorizationException
     * @return void
     */
    public function show(Gatronomium $gatronomium)
    {
        $this->authorize('admin.gatronomium.show', $gatronomium);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gatronomium $gatronomium
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Gatronomium $gatronomium)
    {
        $this->authorize('admin.gatronomium.edit', $gatronomium);


        return view('admin.gatronomium.edit', [
            'gatronomium' => $gatronomium,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGatronomium $request
     * @param Gatronomium $gatronomium
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGatronomium $request, Gatronomium $gatronomium)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Gatronomium
        $gatronomium->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/gatronomia'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/gatronomia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGatronomium $request
     * @param Gatronomium $gatronomium
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGatronomium $request, Gatronomium $gatronomium)
    {
        $gatronomium->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGatronomium $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGatronomium $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Gatronomium::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
