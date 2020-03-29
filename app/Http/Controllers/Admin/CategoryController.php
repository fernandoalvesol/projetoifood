<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;

    public function __construct(Category $category)
    {
        $this->repository = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $categories = $this->repository->latest()->paginate();
=======
        $categories = $this->repository
                           ->where('flag_situacao', 0)
                           ->latest()->paginate();
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17

        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategory $request)
    {
        $this->repository->create($request->all());
<<<<<<< HEAD

        return redirect()->route('categories.index');
=======
        
        return redirect()->route('categories.index')->with('message', 'Registro Incluído com Sucesso!');
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$category = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$category = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.categories.edit', compact('category'));
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\StoreUpdateCategory  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategory $request, $id)
    {
        if (!$category = $this->repository->find($id)) {
<<<<<<< HEAD
            return redirect()->back();
=======
            return redirect()->route('categories.index')->with('error', 'Registro não Encontrado!');
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
        }

        $category->update($request->all());

<<<<<<< HEAD
        return redirect()->route('categories.index');
=======
        return redirect()->route('categories.index')->with('message', 'Registro Editado com Sucesso!');
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        if (!$category = $this->repository->find($id)) {
            return redirect()->back();
        }

        $category->delete();

        return redirect()->route('categories.index');
=======

        $category = $this->repository->find($id);

        if (!$category) {
            return 1; //registro nao encontrado
        }

        //exclusao logica do registro
        $category->update(['flag_situacao' => 1]);

        return 0; //0 = ok!
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
    }


    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $categories = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('name', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.categories.index', compact('categories', 'filters'));
    }
}
