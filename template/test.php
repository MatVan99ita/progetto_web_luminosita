



<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link active cart mt-2" href="login.php">
            <img class="img-fluid" style="width: 50px" src="./upload/user.png" alt="dashboard"><label for="">  Dashboard</label>
        </a>
        
        <a class="nav-link disabled dropdown-divider"> </a>
        <a class="nav-link active" href="carrello.php">
            <img class="img-fluid" style="width: 50px" src="./upload/carts.png" alt="cart">
            <label class="number" id="products_num">Carrello (<span class="total-count">0</span>)</label>
        </a>
        <a class="nav-link active" href="notifications_list.php">
            <img class="img-fluid" style="width: 50px" src="./upload/bell.png" alt="cart">
            <label class="number" id="products_num">Notifiche (<span class="">0</span>)</label>
        </a>
        
        <a class="nav-link disabled dropdown-divider"> </a>
        <a href="" class="nav-link disabled">Categorie</a>
        <a class="nav-link active" href="foodCategory.php?id=1">Primi</a>
        <a class="nav-link active" href="foodCategory.php?id=2">Secondi</a>
        <a class="nav-link active" href="foodCategory.php?id=3">Contorni</a>
        <a class="nav-link active" href="foodCategory.php?id=4">Panini</a>
        <a class="nav-link active" href="foodCategory.php?id=5">Piadine</a>
        <a class="nav-link active" href="foodCategory.php?id=6">BBQ</a>
        <a class="nav-link active" href="foodCategory.php?id=7">Fritti</a>
        <a class="nav-link active" href="foodCategory.php?id=8">Pizze</a>
        <a class="nav-link active" href="foodCategory.php?id=9">Focaccie</a>
        <a class="nav-link active" href="foodCategory.php?id=10">Speciali</a>
        <a class="nav-link active" href="foodCategory.php?id=11">Bevande</a>
        <a class="nav-link active" href="foodCategory.php?id=12">Birre</a>

        <a class="nav-link disabled dropdown-divider"> </a>

        <a class="nav-link active" aria-current="page" href="foodVendor.php?list">Venditori</a>

        <a class="nav-link disabled dropdown-divider"> </a>

        <form class="my-2 my-lg-0 mr-auto mx-auto" style="width: 50%" action="foodSearch.php" method="POST">
            <select name="order">
                <option class="topshow" value="1-All">All</option>
                <option value="1-Primi">1 - Primi</option>
                <option value="2-Secondi">2 - Secondi</option>
                <option value="3-Contorni">3 - Contorni</option>
                <option value="4-Panini">4 - Panini</option>
                <option value="5-Piadine">5 - Piadine</option>
                <option value="6-BBQ">6 - BBQ</option>
                <option value="7-Fritti">7 - Fritti</option>
                <option value="8-Pizze">8 - Pizze</option>
                <option value="9-Focaccie">9 - Focaccie</option>    
                <option value="10-Speciali">10 - Speciali</option>
                <option value="11-Bevande">11 - Bevande</option>
                <option value="12-Birre">12 - Birre</option>
            </select>
            <input type="text" name="search" id="search" class="form-control search-food-name" placeholder="Search Here">
            <div class="input-group-addon">
                <button type="submit" class="fas fa-search bg-red"></button>
            </div>
        </form>
        
        <a class="nav-link disabled dropdown-divider"> </a>
        <a class="nav-link disabled dropdown-divider"> </a>
        <a class="nav-link disabled dropdown-divider"> </a>
        <a class="nav-link disabled dropdown-divider"> </a>
        <a class="nav-link disabled dropdown-divider"> </a>
        <a class="nav-link disabled dropdown-divider"> </a>
    </div>
</div>

<h2>Fullscreen Overlay Nav Example</h2>
<p>Click on the element below to open the fullscreen overlay navigation menu.</p>
<p>In this example, the navigation menu will slide in, from left to right:</p>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

-->
