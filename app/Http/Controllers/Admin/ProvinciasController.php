<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Provincia\BulkDestroyProvincia;
use App\Http\Requests\Admin\Provincia\DestroyProvincia;
use App\Http\Requests\Admin\Provincia\IndexProvincia;
use App\Http\Requests\Admin\Provincia\StoreProvincia;
use App\Http\Requests\Admin\Provincia\UpdateProvincia;
use App\Models\Provincia;
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

class ProvinciasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProvincia $request
     * @return array|Factory|View
     */
    public function index(IndexProvincia $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Provincia::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre'],

            // set columns to searchIn
            ['id', 'nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.provincia.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.provincia.create');

        return view('admin.provincia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProvincia $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProvincia $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Provincia
        $provincium = Provincia::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/provincias'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/provincias');
    }

    /**
     * Display the specified resource.
     *
     * @param Provincia $provincium
     * @throws AuthorizationException
     * @return void
     */
    public function show(Provincia $provincium)
    {
        $this->authorize('admin.provincia.show', $provincium);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Provincia $provincium
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Provincia $provincium)
    {
        $this->authorize('admin.provincia.edit', $provincium);


        return view('admin.provincia.edit', [
            'provincium' => $provincium,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProvincia $request
     * @param Provincia $provincium
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProvincia $request, Provincia $provincium)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Provincia
        $provincium->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/provincias'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/provincias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProvincia $request
     * @param Provincia $provincium
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProvincia $request, Provincia $provincium)
    {
        $provincium->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProvincia $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProvincia $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Provincia::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
