
<ul id="notification_list" class="list-group">
  <li class="list-group-item"><h2>N messaggi di cui M non letti</h2></li>
  <?php $class = array("primary", "light");
  $b = 0;
  for($i=0; $i<8; $i++): ?>
    <li <?php if($b==0): ?> id="toRead" style="border-left: solid 5px" <?php else: ?> id="readed"; <?php endif; ?> class="<?php if($b==0): echo "toRead"; else: echo "readed"; endif ?> list-group-item list-group-item-<?php echo $class[$b]; ?>">
      <section class="mail-notification section" aria-describedby="titleEx1">
        <div class="section-content">
          <!-- contenuto di esempio START -->
          <div class="container">
            <div class="row mb-3">
              <div class="col-12">
                <h2 id="titleEx1">Morbi fermentum amet</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-6 col-xl-4 pe-0 pe-md-5 mb-3 font-serif">Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Dictum sit amet justo donec enim diam vulputate ut. Eu nisl nunc mi ipsum faucibus.</div>
              <div class="col-12 col-lg-6 col-xl-4 pe-0 pe-md-5 mb-3 font-serif">Eget egestas purus viverra accumsan. Diam maecenas ultricies mi eget mauris pharetra et. Etiam dignissim diam quis enim. Eu nisl nunc mi ipsum faucibus.</div>
              <div class="col-12 col-lg-6 col-xl-4 pe-0 pe-md-5 font-serif"><a href="notifiche.php">Euismod lacinia at quis risus sed vulputate. Scelerisque purus semper eget duis at tellus at urna condimentum. Mattis enim ut tellus elementum sagittis.</a></div>
            </div>
          </div>
          <!-- contenuto di esempio END -->
        </div>
      </section>
    </li>
  <?php 
  if($i >= 4){
    $b = 1;
  }
  endfor; ?>
</ul>

<div class="list-group">
  <button type="button" class="list-group-item list-group-item-action active">
    Cras justo odio
  </button>
  <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
  <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
  <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
  <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
</div>

<div class="form-check">
    <input type="checkbox" class="form-check-input" name="updates" id="updates" value="1">
    <label for="updates" class="form-check-label"> Notify me about new updates </label>
</div>
<a href="notifiche.php">Va a guardare</a>
<ul class="list-group">
  <li class="list-group-item">Dapibus ac facilisis in</li>


  <li class="list-group-item list-group-item-primary">primary</li>
  <li class="list-group-item list-group-item-secondary">secondary</li>
  <li class="list-group-item list-group-item-success">success</li>
  <li class="list-group-item list-group-item-danger">danger</li>
  <li class="list-group-item list-group-item-warning">warning</li>
  <li class="list-group-item list-group-item-info">info</li>
  <li class="list-group-item list-group-item-light">light</li>
  <li class="list-group-item list-group-item-dark">dark</li>
</ul>