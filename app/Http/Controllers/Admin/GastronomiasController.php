<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gastronomia\BulkDestroyGastronomia;
use App\Http\Requests\Admin\Gastronomia\DestroyGastronomia;
use App\Http\Requests\Admin\Gastronomia\IndexGastronomia;
use App\Http\Requests\Admin\Gastronomia\StoreGastronomia;
use App\Http\Requests\Admin\Gastronomia\UpdateGastronomia;
use App\Models\Gastronomia;
use App\Models\Localidade;
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

class GastronomiasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGastronomia $request
     * @return array|Factory|View
     */
    public function index(IndexGastronomia $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Gastronomia::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['direccion', 'email', 'id', 'localidad_id', 'nombre', 'telefono', 'tipo', 'web'],

            // set columns to searchIn
            ['direccion', 'email', 'id', 'nombre', 'telefono', 'tipo', 'web'],

            function ($query) use ($request) {
                $query->with(['localidad']);

                // add this line if you want to search by author attributes
                $query->join('localidades', 'localidades.id', '=', 'gastronomias.localidad_id');

                if($request->has('localidad')){
                    $query->whereIn('localidad_id', $request->get('localidades'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.gastronomia.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.gastronomia.create');

        return view('admin.gastronomia.create',[
            'localidad' => Localidade::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGastronomia $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGastronomia $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['localidad_id'] = $request->getLocalidadId();

        // Store the Gastronomia
        $gastronomium = Gastronomia::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/gastronomias'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/gastronomias');
    }

    /**
     * Display the specified resource.
     *
     * @param Gastronomia $gastronomium
     * @throws AuthorizationException
     * @return void
     */
    public function show(Gastronomia $gastronomium)
    {
        $this->authorize('admin.gastronomia.show', $gastronomium);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gastronomia $gastronomium
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Gastronomia $gastronomium)
    {
        $this->authorize('admin.gastronomia.edit', $gastronomium);


        return view('admin.gastronomia.edit', [
            'gastronomium' => $gastronomium,
            'localidad' => Localidade::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGastronomia $request
     * @param Gastronomia $gastronomium
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGastronomia $request, Gastronomia $gastronomium)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['localidad_id'] = $request->getLocalidadId();

        // Update changed values Gastronomia
        $gastronomium->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/gastronomias'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/gastronomias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGastronomia $request
     * @param Gastronomia $gastronomium
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGastronomia $request, Gastronomia $gastronomium)
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
     * @param BulkDestroyGastronomia $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGastronomia $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Gastronomia::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function getGastronomias(){
        return Gastronomia::all();
    }
}
