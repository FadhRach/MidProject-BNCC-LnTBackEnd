<div id="modalDetail" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 transition-opacity duration-300">
    <div class="bg-white p-6 rounded-lg w-96 shadow-lg transform scale-95 transition-transform duration-300">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Book Details</h2>

        <div class="flex justify-center mb-4">
            <img id="bookImage" src="" alt="Book Cover" class="h-40 w-32 rounded-lg shadow-md object-cover">
        </div>

        <div id="modalContent" class="text-gray-700 space-y-2">
            <p><strong>Judul:</strong> <span id="bookTitle"></span></p>
            <p><strong>Author:</strong> <span id="bookAuthor"></span></p>
            <p><strong>Publisher:</strong> <span id="bookPublisher"></span></p>
            <p><strong>Pages:</strong> <span id="bookPages"></span></p>
        </div>

        <div class="flex justify-end mt-5">
            <button onclick="closeModal()" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all">
                Close
            </button>
        </div>
    </div>
</div>

<script>
function openModal(title, author, publisher, pages, image) {
    document.getElementById("bookImage").src = "image/" + image;
    document.getElementById("bookTitle").innerText = title;
    document.getElementById("bookAuthor").innerText = author;
    document.getElementById("bookPublisher").innerText = publisher;
    document.getElementById("bookPages").innerText = pages;

    const modal = document.getElementById("modalDetail");
    modal.classList.remove("hidden");
    modal.children[0].classList.add("scale-100");
}

function closeModal() {
    const modal = document.getElementById("modalDetail");
    modal.children[0].classList.remove("scale-100");
    setTimeout(() => modal.classList.add("hidden"), 200);
}
</script>
