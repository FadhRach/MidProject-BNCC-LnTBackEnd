<?php
    include "backend/koneksi.php";

    $resultt = mysqli_query($konek, "SELECT * FROM book ORDER BY id_book ASC");

    if(!$resultt){
        die("Query Error : ".mysqli_errno($konek)." - ".mysqli_error($konek));
    }
?>
<div id="tableView" class="max-w-screen-xl w-full mx-auto bg-white rounded-xl p-5 shadow-md">
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-200 rounded-xl">
            <thead class="border-b bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-900 border">ID Buku</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-900 border">Image</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-900 border">Judul Buku</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-900 border">Author</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-900 border">Publisher</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-900 border">Page</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-900 border">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultt)) { ?>
                <tr class="border-b">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 border"><?php echo $row['id_book'] ?></td>
                    <td class="px-6 py-4 text-sm text-gray-900 border">
                        <img class="h-16 w-16 rounded-xl" src="image/<?php echo $row['image'] ?>" alt="">
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 border"><?php echo $row['name'] ?></td>
                    <td class="px-6 py-4 text-sm text-gray-900 border"><?php echo $row['author'] ?></td>
                    <td class="px-6 py-4 text-sm text-gray-900 border"><?php echo $row['publisher'] ?></td>
                    <td class="px-6 py-4 text-sm text-gray-900 border"><?php echo $row['number_of_page'] ?></td>
                    <td class="px-6 py-4 text-sm text-gray-900 border">
                        <a href="#" onclick="openModal('<?php echo $row['name'] ?>', '<?php echo $row['author'] ?>', '<?php echo $row['publisher'] ?>', '<?php echo $row['number_of_page'] ?>', '<?php echo $row['image'] ?>')" 
                        class="text-blue-600 hover:text-blue-800">
                            View
                        </a>
                        <a href="book_edit.php?id=<?php echo $row['id_book'] ?>" class="ml-2 text-indigo-600 hover:text-indigo-800">Edit</a>
                        <a href="backend/deletebook.php?id=<?php echo $row['id_book'] ?>" onclick="return confirm('Yakin menghapus data buku ini!')" class="ml-2 text-red-600 hover:text-red-800">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

