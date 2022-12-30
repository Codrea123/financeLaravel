<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="flex flex-row justify-between">

                        <div class="mt-8 text-2xl">
                            Categories
                        </div>
                        <div>
                            <button id="btnModal">
                                Create a new category
                            </button>
                        </div>
                    </div>

                    <div class="mt-6 text-gray-500">
                        <p>Here you can see the created categories.</p>
                    </div>
                    <br>
                    <table class="w-[100%]">
                        <!-- HEAD start -->
                        <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs leading-4 text-gray-500 uppercase tracking-wider">
                            <th class="px-6 py-3 text-left font-medium">
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                        </tr>
                        </thead>
                        <!-- HEAD end -->
                        <!-- BODY start -->
                        <tbody class="bg-white">
                        @foreach($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{$category->name}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">

                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                {{$category->type}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">

                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">

                      </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <form action="{{route('categories.destroy',['category'=>$category])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$category->id}}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <button>
                                        <a href="{{route('categories.edit',['category'=>$category])}}">Edit</a>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('categories.create')
    </div>
</x-app-layout>
