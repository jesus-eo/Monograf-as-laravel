<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de monografias
        </h2>
    </x-slot>
    <div>
        @if (session('succes'))
           <div class="alert alert-success bg-green-400">
             {{ session('succes') }}
           </div>
               @endif
           @if (session('fault'))
           <div class="alert alert-success bg-red-500">
             {{ session('fault') }}
           </div>
           @endif
       </div>

    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">monografias</h1>

        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                                titulo
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                                anyo
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Editar
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Borrar
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($monografias as $monografia)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                {{$monografia->titulo}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$monografia->anyo}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{Route('monografias.edit',[$monografia])}}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{Route('monografias.destroy',[$monografia])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button  class="px-4 py-1 text-sm text-white bg-red-400 rounded" onclick='return confirm("Seguro deseas borrarlo")' type="submit">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <a href="{{Route('monografias.create')}}" class="mt-4 text-blue-900 hover:underline">Insertar una nueva monografia</a>
                        </td>
                    </tr>

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
