<x-guest-layout>



    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">monografia</h1>

        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                                titulo
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                                Nombre autores
                        </th>


                    </tr>
                </thead>
                <tbody class="bg-white">
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                {{$monografias->titulo}}
                                </div>
                            </td>

                          @foreach ($monografias->articulos as $articulo)
                          <td class="px-6 py-4">
                            @foreach ($articulo->autores as $autor)
                            <div class="text-sm text-gray-900">
                                {{$autor->nombre}}
                            </div>
                            @endforeach

                        </td>
                          @endforeach

                        </tr>

                </tbody>
            </table>
        </div>

    </div>
</x-guest-layout>
