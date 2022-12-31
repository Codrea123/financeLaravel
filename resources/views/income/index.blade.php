<x-app-layout>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 flex justify-around">
                    <div class="w-[100%]">
                        <div class="mt-8 text-2xl">
                            Income
                        </div>
                        <div class="mt-6 text-gray-500">
                            <p>Here you can see your income.</p>
                        </div>
                        <br>
                        <table class="w-[100%]" id="myTable">
                            <!-- HEAD start -->
                            <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs leading-4 text-gray-500 uppercase tracking-wider text-center">
                                <th class="px-6 py-3  font-medium">
                                    Name
                                </th>
                                <th class="px-6 py-3 font-medium">
                                    <button id="sortBtnAmount">AMOUNT <i class="fa fa-arrow-down hidden stroke-1" aria-hidden="true" id="arrowDown"></i><i class="fa fa-arrow-up stroke-1 hidden" aria-hidden="true" id="arrowUp"></i> </button>
                                </th>
                                <th class="px-6 py-3 font-medium">
                                    Category
                                </th>
                                <th class="px-6 py-3 font-medium">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <!-- HEAD end -->
                            <!-- BODY start -->
                            <tbody class="bg-white text-center">
                            @foreach($incomes as $income)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 " >
                                        <div class="text-sm leading-5 text-gray-900">
                                            <p>{{$income->name}}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            <p>{{$income->amount}}</p> RON
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                                <p>{{$income->category->name ?? ''}}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap  border-b border-gray-200 text-sm leading-5 font-medium">
                                        <form action="{{route('income.destroy',['income'=>$income])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{$income->id}}">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o text-3xl text-red-500" aria-hidden="true"></i></button>
                                        </form>
                                        <button>
                                            <a href="{{route('income.edit',['income'=>$income])}}"><i class="fa fa-pencil-square text-3xl text-green-400" aria-hidden="true"></i></a>
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
        @include('income.create')


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
        <script>
            document.addEventListener('DOMContentLoaded',function() {
                var btn = document.getElementById('sortBtnAmount');
                var arrD = document.getElementById('arrowDown');
                var arrU = document.getElementById('arrowUp');
                var n=0;
                btn.addEventListener('click', function (){
                    if(n==0){
                        n=1;
                    }else{
                        n=0;
                    }
                    function changeArrow(n){
                        if(n!=0){
                            arrD.classList.add('hidden');
                            arrU.classList.remove('hidden');
                        }else{
                            arrD.classList.remove('hidden');
                            arrU.classList.add('hidden');
                        }
                    }
                    function sortTableAmount(n){

                        var table, rows, switching, i, x, y, shouldSwitch;
                        table = document.getElementById("myTable");
                        switching = true;
                        /* Make a loop that will continue until
                        no switching has been done: */
                        while (switching) {
                            // Start by saying: no switching is done:
                            switching = false;
                            rows = table.rows;
                            /* Loop through all table rows (except the
                            first, which contains table headers): */
                            for (i = 1; i < (rows.length - 1); i++) {
                                // Start by saying there should be no switching:
                                shouldSwitch = false;
                                /* Get the two elements you want to compare,
                                one from current row and one from the next: */
                                x = rows[i].getElementsByTagName("P")[1];
                                y = rows[i + 1].getElementsByTagName("P")[1];
                                // Check if the two rows should switch place:
                                if(n%2==0){
                                    if (Number(x.innerHTML) < Number(y.innerHTML)) {
                                        // If so, mark as a switch and break the loop:
                                        shouldSwitch = true;
                                        break;
                                    }
                                }else{
                                    if (Number(x.innerHTML) > Number(y.innerHTML)) {
                                        // If so, mark as a switch and break the loop:
                                        shouldSwitch = true;
                                        break;
                                    }
                                }
                            }
                            if (shouldSwitch) {
                                /* If a switch has been marked, make the switch
                                and mark that a switch has been done: */
                                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                switching = true;
                            }
                        }
                    }
                    sortTableAmount(n);
                    changeArrow(n);
                })
            })


        </script>
    </div>
</x-app-layout>
