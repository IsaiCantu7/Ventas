<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('Show Products') }}</h2>
                    <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-md flex items-center">
                        <i class="bi bi-arrow-left mr-1"></i> {{ __('Back') }}
                    </a>
                </div>

                <div>
                    <label for="code" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Code') }}</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="code" name="code" value="{{ $product->code }}" readonly>
                </div>

                <div>
                    <label for="name" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Name') }}</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="name" name="name" value="{{ $product->name }}" readonly>
                </div>

                <div>
                    <label for="quantity" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Quantity') }}</label>
                    <input type="number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="quantity" name="quantity" value="{{ $product->quantity }}" readonly>
                </div>
                
                <div>
                    <label for="purchase_price" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Purchase Price') }}</label>
                    <input type="number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="purchase_price" name="purchase_price" value="{{ $product->purchase_price }}" readonly>
                </div>

                <div>
                    <label for="sale_price" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Sale Price') }}</label>
                    <input type="number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="sale_price" name="sale_price" value="{{ $product->sale_price }}" readonly>
                </div>
                
                <div>
                    <label for="motivo" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Motivo') }}</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="motivo" name="motivo" value="{{ $product->motivo }}" readonly>
                </div>

                <div>
                    <label for="description_short" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Description Short') }}</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="description_short" name="description_short" value="{{ $product->description_short }}" readonly>
                </div>
                                
                <div>
                    <label for="category_id" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Category') }}</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="category_id" name="category_id" value="{{ $product->category->name }}" readonly>
                </div>

                <div>
                    <label for="description_large" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Description Large') }}</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="description_large" name="description_large" value="{{ $product->description_large }}" readonly>
                </div>
                
                <div>
                    <label for="colors" class="block text-md font-semibold text-gray-700 dark:text-gray-300 mb-1">{{ __('Colors') }}</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="colors" name="colors" value="{{ $product->colors }}" readonly>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
