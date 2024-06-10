<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventories;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sales;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventories::latest()->paginate(10);
        $products = Product::all();
        $sales = Sales::all();
        return view('inventories.index', compact('inventories', 'products', 'sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Aquí puedes pasar los datos necesarios para el formulario de creación
        $products = Product::all();
        $categories = Category::all();
        return view('inventories.create', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'category_id' => 'required|exists:categories,id',
            'entry_date' => 'required|date',
            'quantity' => 'required|integer',
            'reason' => 'nullable|string',
            'shift' => 'nullable|string',
        ]);

        Inventories::create($request->all());

        return redirect()->route('inventories.index')->with('success', 'Inventario creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventories  $inventory
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventories  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventories $inventory)
    {
        $categories = Category::all();
        return view('inventories.edit', compact('inventory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventories  $inventory
     * @return \Illuminate\Http\Response
     */

public function update(Request $request, Inventories $inventory)
{
    $request->validate([
        'code' => 'required|string',
        'name' => 'required|string',
        'description_short' => 'nullable|string',
        'description_large' => 'nullable|string',
        'colors' => 'nullable|string',
        'purchase_price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'motivo' => 'required|string',
        'quantity' => 'required|integer',  
    ]);

    // Actualizar el inventario
    $inventory->update($request->all());

    // Actualizar el producto relacionado
    $product = $inventory->product;
    if ($product) {
        $product->update([

            'code' => $request->code,
            'name' => $request->name,
            'description_short' => $request->description_short,
            'description_large' => $request->description_large,
            'colors' => $request->colors,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            // Actualiza otros campos de producto si es necesario
        ]);
    }

    return redirect()->route('inventories.index')->with('success', 'Inventario y productos actualizados correctamente.');
}

public function show(Inventories $inventory)
{
    // Obtener el producto asociado
    $product = $inventory->product;
    
    return view('inventories.show', compact('inventory', 'product'));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventories  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventories $inventory)
    {
        // Obtener el producto asociado
        $product = $inventory->product;
    
        // Eliminar el inventario
        $inventory->delete();
    
        // Verificar si el producto está asociado y eliminarlo
        if ($product) {
            $product->delete();
        }
    
        return redirect()->route('inventories.index')->with('success', 'Inventario y producto asociados eliminados correctamente.');
    }
    
}
