<div class="w-[100%] h-[100%] flex justify-center align-center hidden" id="modal" >
    <div class="bg-white  absolute top-[40%] w-[35%] h-[30%] flex align-center justify-center shadow-xl rounded-xl">
        <div class="w-[80%]">
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="form-group"><br>
                    <label for="name">Name</label> <br>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"> <br>
                </div>
                <div class="form-group">
                    <label for="type">Type</label> <br>
                    <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mb-4 category-select">
                        <option value="{{\App\Models\Category::TYPE_INCOME}}">Income</option>
                        <option value="{{\App\Models\Category::TYPE_EXPENSE}}">Expense</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" id="closeModal">Close</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = document.getElementById('modal');
        var btnModal = document.getElementById('btnModal');
        var closeModal = document.getElementById('closeModal');
        btnModal.addEventListener('click', function (event) {
            modal.classList.toggle('hidden');
        });
        closeModal.addEventListener('click', function (event) {
            modal.classList.add('hidden');
        });
    });
</script>
