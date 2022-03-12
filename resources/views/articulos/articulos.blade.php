<x-guest-layout>



    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Artículos</h1>

        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                                Título
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                                Número de autores
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Número de monografías
                    </th>

                    </tr>
                </thead>
                <tbody class="bg-white">



                          @foreach ($articulos as $articulo)
                          <tr class="whitespace-nowrap">
                          <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{$articulo->titulo}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{$autores->find($articulo->id)->autores_count}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{$monografias->find($articulo->id)->monografias_count}}
                            </div>
                        </td>
                    </tr>
                          @endforeach




                </tbody>
            </table>
        </div>
        <form class="py-4" action="{{ route('logout') }}" method="POST">
            @method('POST')
            @csrf
            <button class="px-4 py-2 rounded bg-blue-300" type="submit">Salir</button>
        </form>

    </div>
</x-guest-layout>
