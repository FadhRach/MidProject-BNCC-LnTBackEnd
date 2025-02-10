<?php
    include "backend/koneksi.php";

    $resultc = mysqli_query($konek, "SELECT * FROM book ORDER BY id_book ASC");

    if(!$resultc){
        die("Query Error : ".mysqli_errno($konek)." - ".mysqli_error($konek));
    }
?>
<div id="cardView" class="hidden max-w-screen-xl w-full mx-auto grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 justify-items-center gap-6 bg-white rounded-xl p-5 shadow-md">
    <?php while ($row = mysqli_fetch_assoc($resultc)) { ?>
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#" onclick="openModal('<?php echo $row['name'] ?>', '<?php echo $row['author'] ?>', '<?php echo $row['publisher'] ?>', '<?php echo $row['number_of_page'] ?>', '<?php echo $row['image'] ?>')" >
        <img src="image/<?php echo $row['image'] ?>" alt="Product" class="h-60 w-full object-cover rounded-t-xl" />
        <div class="px-4 py-3">
            <span class="text-gray-400 text-xs"><?php echo $row['author'] ?></span>
            <p class="text-xl font-bold text-black truncate capitalize"><?php echo $row['name'] ?></p>
            <p class="text-sm text-black"><?php echo $row['publisher'] ?></p>
            <div class="text-md my-3 flex items-center justify-between space-x-3">
                <p class="text-gray-800"><?php echo $row['number_of_page']; ?> Page</p>
                <div class="flex">
                    <a href="book_edit.php?id=<?php echo $row['id_book'] ?>" class="hover:text-blue-600 transition-all">
                        <svg class="w-6 h-6 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>
                    </a>
                    <a href="backend/deletebook.php?id=<?php echo $row['id_book'] ?>" onclick="return confirm('Yakin menghapus data buku ini!')" class="hover:text-red-600 transition-all">
                        <svg class="w-6 h-6 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        </a>
    </div>
    <?php } ?>
</div>
