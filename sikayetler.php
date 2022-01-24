  <!-- şikayetler  -->
  <div class="col-sm-12 text-center" style="color:purple">
        <h2>ŞİKAYETLER</h2>
        <hr style="background-color:purple">
  </div>
  <div class="col-sm-12">
        <div class="row">
              <?php
                  $sikayetler = $db->prepare("SELECT * FROM report where active = 1");
                  $sikayetler->execute();
                  $dongu = 1;
                  foreach ($sikayetler as $sikayet) {
                        $kullanıcı = $db->prepare("SELECT * FROM user WHERE id=" . $sikayet['userid']);
                        $kullanıcı->execute();
                        $rowKullanıcı = $kullanıcı->fetch();
                        $sirket = $db->prepare("SELECT * FROM company WHERE id=" . $sikayet['companyid']);
                        $sirket->execute();
                        $rowSirket = $sirket->fetch();

                  ?>
                    <?php if ($dongu % 4 == 0) { ?>
                          <div class="col-sm-12">
                                <div class="card" style="width:100%;margin-bottom:1.6%;border:1px dotted purple">
                                      <div class="card-body">
                                            <h5 class="card-title"><span style="font-size:13px;color:gray">Kullanıcı</span><br><?php echo $rowKullanıcı["firstname"] . " " . $rowKullanıcı["lastname"] ?></h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><span style="font-size:13px;color:gray;margin-right:3px">Şirket</span><?php echo $rowSirket['companyname']; ?></h6>
                                            <p class="card-text" style="font-size:16px;"><span style="font-size:13px;color:gray;margin-right:3px">Şikayet</span><?php echo substr($sikayet['issue'], 0, 100) . "..."; ?></p>
                                            <div class="text-center"><a href="sikayetdetay.php?id=<?php echo $sikayet['id']; ?>" style="background-color:purple;color:white;" class="btn"><span style="font-size:13px">Devamını Gör</span></a></div>
                                      </div>
                                </div>
                          </div>

                    <?php } else { ?>
                          <div class="col-sm-4">
                                <div class="card" style="width:100%;margin-bottom:5%;border:1px dotted purple">
                                      <div class="card-body">
                                            <h5 class="card-title"><span style="font-size:13px;color:gray">Kullanıcı</span><br><?php echo $rowKullanıcı["firstname"] . " " . $rowKullanıcı["lastname"] ?></h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><span style="font-size:13px;color:gray;margin-right:3px">Şirket</span><?php echo $rowSirket['companyname']; ?></h6>
                                            <p class="card-text" style="font-size:16px;"><span style="font-size:13px;color:gray;margin-right:3px">Şikayet</span><?php echo substr($sikayet['issue'], 0, 100) . "..."; ?></p>
                                            <div class="text-center"><a href="sikayetdetay.php?id=<?php echo $sikayet['id']; ?>" style="background-color:purple;color:white;" class="btn"><span style="font-size:13px">Devamını Gör</span></a></div>
                                      </div>
                                </div>
                          </div>
                    <?php } ?>
              <?php
                        $dongu += 1;
                  } ?>
        </div>
  </div>
  <div class="text-center"><a href="tumsikayetler.php" style="background-color:purple;color:white;width:100%" class="btn"><span style="font-size:18px">Hepsini Gör</span></a></div>
  <hr style="background-color:purple">