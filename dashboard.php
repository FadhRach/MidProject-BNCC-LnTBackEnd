<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location:login.php');
    }

    include "backend/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management | LNT BackEnd</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function toggleView(view) {
            const tableView = document.getElementById("tableView");
            const cardView = document.getElementById("cardView");
            const tableButton = document.getElementById("tableButton");
            const cardButton = document.getElementById("cardButton");

            if (view === "table") {
                tableView.classList.remove("hidden");
                cardView.classList.add("hidden");

                tableButton.classList.add("bg-blue-500", "text-white");
                tableButton.classList.remove("bg-white", "text-black");

                cardButton.classList.add("bg-white", "text-black");
                cardButton.classList.remove("bg-blue-500", "text-white");
            } else {
                tableView.classList.add("hidden");
                cardView.classList.remove("hidden");

                cardButton.classList.add("bg-blue-500", "text-white");
                cardButton.classList.remove("bg-white", "text-black");

                tableButton.classList.add("bg-white", "text-black");
                tableButton.classList.remove("bg-blue-500", "text-white");
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            toggleView("table");
        });
    </script>

</head>

<body class="bg-gray-100">
    <div class="min-h-screen w-full py-6 flex flex-col sm:py-12">
        <!-- Navbar -->
        <?php include "component/header.php"; ?>

        <!-- Toggle Button (di bawah Navbar) -->
        <div class="max-w-screen-xl mx-auto flex gap-4 mt-12 mb-5 w-full bg-white px-4 py-4 rounded-xl shadow-md">
            <button id="tableButton" onclick="toggleView('table')" class="px-4 py-2 text-sm font-medium border rounded-lg bg-blue-500 text-white">Table View</button>
            <button id="cardButton" onclick="toggleView('card')" class="px-4 py-2 text-sm font-medium border rounded-lg bg-white text-black" >Card View</button>
        </div>

        <!-- Include Table View & Card View -->
        <?php include "component/table_view.php"; ?>
        <?php include "component/card_view.php"; ?>
    </div>

    <?php include "component/detail_view.php"; ?>

    <?php include "component/footer.php"; ?>
</body>

</html>
