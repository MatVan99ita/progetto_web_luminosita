<style>

.image {
    border: 2px solid #fff;
    overflow: hidden
}

.image img {
    width: 100%;
    height: 300;
    transition: all 1s ease-in-out
}

.image:hover img {
    transform: scale(1.5, 1.5);
    cursor: pointer
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="image"> <img src="https://i.imgur.com/ptT381b.jpg" /> </div>
        </div>
        <div class="col-md-4">
            <div class="image"> <img src="https://i.imgur.com/EGtKPqm.jpg" /> </div>
        </div>
        <div class="col-md-4">
            <div class="image"> <img src="https://i.imgur.com/cv3bPVx.jpg" /> </div>
        </div>
    </div>
</div>