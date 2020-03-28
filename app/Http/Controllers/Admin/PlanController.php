<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use Alert;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {        

        $plans = $this->repository
                       ->where('flag_situacao', 0) 
                       ->latest()->paginate();
        
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index')->with('message', 'Registro Incluído com Sucesso!');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function destroy($id)
    {                    
        
        $plan = $this->repository
                        ->with('details')
                        ->where('id', $id)
                        ->first();                        

        if (!$plan)
            return 1; //registro nao encontrado

        if ($plan->details->count() > 0) {
            return 2; //Existem detalhes vinculados a esse plano, portanto não pode deletar
        }        
        
        //exclusao logica do registro
        $plan->update(['flag_situacao' => 1]);

        return 0; //0 = ok!
    }
    

    public function search(Request $request)
    
    {
        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back()->with('error', 'Registro não Encontrado!');

        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan){
            return redirect()->route('plans.index')->with('error', 'Registro não Encontrado!');            
        }            

        $plan->update($request->all());
                        
        return redirect()->route('plans.index')->with('message', 'Registro Editado com Sucesso!');
    }
}
