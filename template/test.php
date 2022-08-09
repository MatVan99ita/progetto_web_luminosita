<div class="" id="navbarNavDropdown">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item mx-auto">
            <a class="nav-link active" aria-current='page' href="foodVendor.php?list">Venditori  </a>
        </li>
        <li class="nav-item mx-auto dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categoria
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php foreach($templateParams["category"] as $category): ?>
                <li class="dropdown-item">
                    <a class="btn btn-primary w-100" href="foodCategory.php?id=<?php echo $category["CategoryID"]; ?>">
                        <?php echo $category["CategoryName"]; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
</div>