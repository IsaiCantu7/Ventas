<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventarios') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white dark:bg-gray-800">
                            <div class="text-center text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                                {{ __('Lista de Inventarios') }}
                            </div>

                            <!-- Inventarios Table -->
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cantidad</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Descripción corta</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Descripción larga</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Precio de venta</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Precio de compra</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de entrada</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Motivo</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @forelse ($inventories as $inventory)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $inventory->id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $inventory->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $inventory->quantity }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $inventory->description_short }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $inventory->description_large }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $inventory->sale_price }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $inventory->purchase_price }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $inventory->created_at }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $inventory->motivo }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="{{ route('inventories.show', $inventory->id) }}" class="text-blue-600 hover:underline">Mostrar</a>
                                                    <a href="{{ route('inventories.edit', $inventory->id) }}" class="text-yellow-600 hover:underline ml-2">Editar</a>
                                                    <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('¿Estás seguro de que deseas eliminar este inventario?')">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="px-6 py-4 whitespace-nowrap text-red-500 text-center">
                                                    <strong>{{ __('No Inventories Found!') }}</strong>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-6">
                                {{ $inventories->links() }}
                            </div>

                            <!-- Ventas Table -->
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('Ventas Realizadas') }}</h2>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Producto</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Categoría</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cliente</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de Venta</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Subtotal</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">IVA</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Total</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Motivo</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de venta</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @forelse ($sales as $sale)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->name_product }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->name_category }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->name_customer }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->date_sale }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->subtotal }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->iva }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->total }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->motivo }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $sale->created_at }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="px-6 py-4 whitespace-nowrap text-red-500 text-center">
                                                    <strong>{{ __('No Sales Found!') }}</strong>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
