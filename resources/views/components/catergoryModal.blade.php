<!-- Modal -->
<div id="categoryModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="bg-white p-8 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Add Category</h2>
        <form action="{{ route('addcategory') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="id" class="block text-sm font-medium text-gray-700">Category ID</label>
                <input type="text" name="id" id="id" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" >
           
            </div>
            <div class="mb-4">
                <label for="category_type" class="block text-sm font-medium text-gray-700">Category Type</label>
                <select name="category_type" id="category_type" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
                    <option value="" disabled selected>Select Category Type</option>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                    <option value="Kids">Kids</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" class="px-4 py-2 mr-2 text-white rounded-lg" style="background-color: #1A1A1A;" onclick="closeModal('categoryModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 text-white rounded-lg" style="background-color: #000000;">Add</button>
            </div>
        </form>
    </div>
</div>
