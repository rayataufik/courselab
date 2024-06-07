<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    <x-head.tinymce-config />
</head>

<body>
    <nav class="sidebar">
        @include('includes.sidebar')
    </nav>
    <nav class="navbar-side">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>

    <main class="main-course">
        @yield('content')
    </main>

    <script>
        const sidebar = document.querySelector(".sidebar");
        const sidebarClose = document.querySelector("#sidebar-close");
        const menu = document.querySelector(".menu-content");
        const menuItems = document.querySelectorAll(".submenu-item");
        const subMenuTitles = document.querySelectorAll(".submenu .menu-title");

        sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));

        menuItems.forEach((item, index) => {
            item.addEventListener("click", () => {
                menu.classList.add("submenu-active");
                item.classList.add("show-submenu");
                menuItems.forEach((item2, index2) => {
                    if (index !== index2) {
                        item2.classList.remove("show-submenu");
                    }
                });
            });
        });

        subMenuTitles.forEach((title) => {
            title.addEventListener("click", () => {
                menu.classList.remove("submenu-active");
            });
        });

        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            // preview.style.display = 'block';
            preview.style.width = '50%';
            preview.style.height = '50%';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>

</html>