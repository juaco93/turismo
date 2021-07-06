<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Localidade\BulkDestroyLocalidade;
use App\Http\Requests\Admin\Localidade\DestroyLocalidade;
use App\Http\Requests\Admin\Localidade\IndexLocalidade;
use App\Http\Requests\Admin\Localidade\StoreLocalidade;
use App\Http\Requests\Admin\Localidade\UpdateLocalidade;
use App\Models\Departamento;
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

class LocalidadesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLocalidade $request
     * @return array|Factory|View
     */
    public function index(IndexLocalidade $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Localidade::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['departamento_id', 'id', 'nombre'],

            // set columns to searchIn
            ['id', 'nombre'],

            function ($query) use ($request) {
                $query->with(['departamento']);

                // add this line if you want to search by author attributes
                $query->join('departamentos', 'departamentos.id', '=', 'localidades.departamento_id');

                if($request->has('departamentos')){
                    $query->whereIn('departamento_id', $request->get('departamentos'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return [
                'data' => $data,
                'departamentos' => Departamento::all()
            ];
        }

        return view('admin.localidade.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.localidade.create');

        return view('admin.localidade.create',[
            'departamentos' => Departamento::all()
        ]
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLocalidade $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLocalidade $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['departamento_id'] = $request->getDepartamentoId();

        // Store the Localidade
        $localidade = Localidade::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/localidades'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/localidades');
    }

    /**
     * Display the specified resource.
     *
     * @param Localidade $localidade
     * @throws AuthorizationException
     * @return void
     */
    public function show(Localidade $localidade)
    {
        $this->authorize('admin.localidade.show', $localidade);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Localidade $localidade
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Localidade $localidade)
    {
        $this->authorize('admin.localidade.edit', $localidade);


        return view('admin.localidade.edit', [
            'localidade' => $localidade,
            'departamentos' => Departamento::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLocalidade $request
     * @param Localidade $localidade
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLocalidade $request, Localidade $localidade)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['departamento_id'] = $request->getDepartamentoId();

        // Update changed values Localidade
        $localidade->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/localidades'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/localidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLocalidade $request
     * @param Localidade $localidade
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLocalidade $request, Localidade $localidade)
    {
        $localidade->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLocalidade $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLocalidade $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Localidade::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
