<ul id="notification_list" class="list-group">
  <li class="list-group-item"><h2><?php echo $templateParams["totNotification"] . " notifiche di cui " . $templateParams["toReadNotif"] . " non lette"; ?></h2></li>
  <?php $class = array("primary", "light");
  $b = 0;
  foreach ($templateParams["mail"] as $mail):
  ?>
    <li <?php if($mail["isRead"]==0): ?> id="toRead" style="border-left: solid 5px" <?php else: ?> id="readed"; <?php endif; ?> class="<?php if($mail["isRead"]==0): echo "toRead"; else: echo "readed"; endif ?> list-group-item list-group-item-<?php echo $class[$mail["isRead"]]; ?>">
      <section class="mail-notification section" aria-describedby="titleEx1">
        <div class="section-content">
          <!-- contenuto di esempio START -->
          <div class="container">
            <div class="row mb-3">
              <div class="col-12">
                <h2 id="titleEx1"><?php echo $mail["obj"]; ?></h2>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-6 col-xl-4 pe-0 pe-md-5 mb-3 font-serif"><?php echo $mail["send"]; ?></div>
              <div class="col-12 col-lg-6 col-xl-4 pe-0 pe-md-5 mb-3 font-serif"></div>
              <div class="col-12 col-lg-6 col-xl-4 pe-0 pe-md-5 font-serif"><a href="notifiche.php?id=<?php echo $mail["notificationID"]."&read=".$mail["isRead"]; ?>">Leggi la notifica</a></div>
            </div>
          </div>
          <!-- contenuto di esempio END -->
        </div>
      </section>
    </li>
  <?php endforeach; ?>
  <li id="spacing" class="list-group-item">
  </li>
</ul>
<?php /*
    (
        [notificationID]
        [dest]
        [send]
        [obj]
        [body]
        [isRead]
        [customerID]
    )
 */ ?>

