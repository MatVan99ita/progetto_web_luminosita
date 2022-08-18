



<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link active" aria-current="page" href="foodVendor.php?list">Venditori</a>
        
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown link
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item nav-link active" href="#">Action</a>
              <a class="dropdown-item nav-link active" href="#">Another action</a>
              <a class="dropdown-item nav-link active" href="#">Something else here</a>
            </div>
        </div>

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


        <form class="my-2 my-lg-0 mr-auto mx-auto" action="foodSearch.php" method="POST">
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

        <div class="nav-item cart mt-2">
            <a href="carrello.php">
                <img class="img-fluid" style="width: 50px" src="./upload/carts.png" alt="cart">
                <span class="dot number" id="products_num">
                    <span class="total-count dot">0</span>
                </span>
            </a>
        </div>

        <div class="nav-item cart mt-2">
            <a href="notifications_list.php">
                <img class="img-fluid" style="width: 50px" src="./upload/bell.png" alt="cart">
                <span class="dot number" id="products_num">
                    <span class="">0</span>
                </span>
            </a>
        </div>

        <div class="nav-item cart mt-2">
            <a href="login.php">
                <img class="img-fluid" style="width: 50px" src="./upload/user.png" alt="dashboard">                    </a>
        </div>
    </div>
</div>

<h2>Fullscreen Overlay Nav Example</h2>
<p>Click on the element below to open the fullscreen overlay navigation menu.</p>
<p>In this example, the navigation menu will slide in, from left to right:</p>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
-->
