<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gastronomium\BulkDestroyGastronomium;
use App\Http\Requests\Admin\Gastronomium\DestroyGastronomium;
use App\Http\Requests\Admin\Gastronomium\IndexGastronomium;
use App\Http\Requests\Admin\Gastronomium\StoreGastronomium;
use App\Http\Requests\Admin\Gastronomium\UpdateGastronomium;
use App\Models\Gastronomium;
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

class GastronomiaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGastronomium $request
     * @return array|Factory|View
     */
    public function index(IndexGastronomium $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Gastronomium::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.gastronomium.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.gastronomium.create');

        return view('admin.gastronomium.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGastronomium $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGastronomium $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Gastronomium
        $gastronomium = Gastronomium::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/gastronomia'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/gastronomia');
    }

    /**
     * Display the specified resource.
     *
     * @param Gastronomium $gastronomium
     * @throws AuthorizationException
     * @return void
     */
    public function show(Gastronomium $gastronomium)
    {
        $this->authorize('admin.gastronomium.show', $gastronomium);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gastronomium $gastronomium
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Gastronomium $gastronomium)
    {
        $this->authorize('admin.gastronomium.edit', $gastronomium);


        return view('admin.gastronomium.edit', [
            'gastronomium' => $gastronomium,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGastronomium $request
     * @param Gastronomium $gastronomium
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGastronomium $request, Gastronomium $gastronomium)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Gastronomium
        $gastronomium->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/gastronomia'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/gastronomia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGastronomium $request
     * @param Gastronomium $gastronomium
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGastronomium $request, Gastronomium $gastronomium)
    {
        $gastronomium->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGastronomium $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGastronomium $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Gastronomium::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
