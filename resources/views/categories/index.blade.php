<x-app-layout>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 flex justify-around">
                    <div class="w-[100%]">
                        <div class="mt-8 text-2xl">
                            Categories
                        </div>
                        <br>
                        <table class="w-[100%]">
                            <!-- HEAD start -->
                            <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs leading-4 text-gray-500 uppercase tracking-wider text-center">
                                <th class="px-6 py-3  font-medium">
                                    Name
                                </th>
                                <th class="px-6 py-3 font-medium">
                                    Type
                                </th>
                                <th class="px-6 py-3 font-medium">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <!-- HEAD end -->
                            <!-- BODY start -->
                            <tbody class="bg-white text-center">
                            @foreach($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 " >
                                        <div class="text-sm leading-5 text-gray-900">
                                            <p>{{$category->name}}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            <p>{{$category->type}} </p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap  border-b border-gray-200 text-sm leading-5 font-medium">
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
                    <div>
                        <button id="btnModal">
                            <i class="fa fa-plus-square text-3xl text-blue-500" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @include('categories.create')


        @if(session()->has('success'))
            <script>
                document.addEventListener('DOMContentLoaded',function (){
                    Swal.fire({
                        icon: 'success',
                        title: `{{session()->get('success')}}`,
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
            </script>
        @endif
    </div>
</x-app-layout>
