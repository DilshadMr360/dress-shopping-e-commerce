@props(['categories'])
<!-- Product Modal -->
<div id="productModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="w-1/3 p-8 bg-white rounded-lg">
        <h2 class="mb-4 text-xl font-bold">Add Product</h2>
        <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="product_title" class="block text-sm font-medium text-gray-700">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
                    <input type="text" name="price" id="price" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="product_description" class="block text-sm font-medium text-gray-700">Product Description</label>
                    <textarea name="product_description" id="product_description" rows="2" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>
            </div>
            <div class="mb-4">
                <label for="product_image" class="block text-sm font-medium text-gray-700">Product Image</label>
                <div class="progress-photos flex flex-col cursor-pointer items-center justify-center min-h-40 h-auto bg-[#F8F9FA] rounded w-full px-4 py-6 relative"
                id="progressPhotosDropArea">
                <div id="uploadedFiles" class="w-20 h-20">
                    <!-- Uploaded files will be shown here -->
                </div>
                <div id="uploadInstructions" class="flex flex-col items-center">
                    <i class="mb-2 text-3xl text-gray-600 fas fa-cloud-upload-alt"></i>
                    <p class="text-gray-600">Click to upload.</p>
                    <input type="file" name="product_image" id="fileInput" style="display:none;" accept="image/jpeg, image/png">
                </div>
            </div>
            </div>
            <div class="flex justify-end">
                <button type="button" class="px-4 py-2 mr-2 text-white rounded-lg" style="background-color: #1A1A1A;" onclick="closeModal('productModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 text-white rounded-lg" style="background-color: #000000;">Add</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('progressPhotosDropArea').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });

    document.getElementById('fileInput').addEventListener('change', function(event) {
        const uploadedFiles = document.getElementById('uploadedFiles');
        const uploadInstructions = document.getElementById('uploadInstructions');
        uploadedFiles.innerHTML = ''; // Clear any previous images
        const files = event.target.files;
        if (files.length > 0) {
            const file = files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-full', 'h-auto', 'rounded');
                uploadedFiles.appendChild(img);
            };
            reader.readAsDataURL(file);
            uploadInstructions.style.display = 'none'; // Hide upload instructions
        }
    });
</script>
