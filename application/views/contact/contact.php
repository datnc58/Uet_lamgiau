<!-- begin sc_detail -->
    <section class="sc_contact">
        <div class="container">
            <h3>Liên hệ</h3>
            <div class="ggmap">
                <div class="map">
                   <?php
                      $map_title = '';
                      $map_phone = '';
                      $map_adrdress = '';
                      if($this->option->map_title !=''){
                          $map_title = '<div class="map_title"><b>'.$this->option->map_title.'</b></div>';
                      }
                      if($this->option->map_adrdress !=''){
                          $map_adrdress = '<div><b>Địa chỉ: </b>'.$this->option->map_adrdress.'</div>';
                      }
                      
                      if($this->option->map_phone !=''){
                          $map_phone = '<div><b>Điện thoại: </b>'.$this->option->map_phone.'</div>';
                      }
                      $hien_map = "'".$map_title.''.$map_adrdress.''.$map_phone."'";
                      ?>
                   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1w21tUvxObGqTgv2fKillyxFfQxICJbs&language=vi"></script>
                   <script type="text/javascript">
                      var map;
                      var infowindow;
                      var marker = new Array();
                      var old_id = 0;
                      var infoWindowArray = new Array();
                      var infowindow_array = new Array();
                      
                      function initialize() {
                          var defaultLatLng = new google.maps.LatLng<?=$this->option->hdfMap;?>;
                          var myOptions = {zoom: 15, center: defaultLatLng, scrollwheel: false, mapTypeId: google.maps.MapTypeId.ROADMAP };
                          map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                          map.setCenter(defaultLatLng);
                          var arrLatLng = new google.maps.LatLng<?=$this->option->hdfMap;?>;
                          infoWindowArray[10349] =<?=$hien_map;?>;
                          loadMarker(arrLatLng, infoWindowArray[10349], 10349);
                          moveToMaker(10349);
                      }
                      function loadMarker(myLocation, myInfoWindow, id) {
                          marker[id] = new google.maps.Marker({position: myLocation, map: map, visible: true});
                          var popup = myInfoWindow;
                          infowindow_array[id] = new google.maps.InfoWindow({ content: popup});
                          google.maps.event.addListener(marker[id], 'mouseover', function () {
                              if (id == old_id) return;
                              if (old_id > 0) infowindow_array[old_id].close();
                              infowindow_array[id].open(map, marker[id]);
                              old_id = id;
                          });
                          google.maps.event.addListener(infowindow_array[id], 'closeclick', function () {
                              old_id = 0;
                          });
                      }
                      function moveToMaker(id) {
                          var location = marker[id].position;
                          map.setCenter(location);
                          if (old_id > 0) infowindow_array[old_id].close();
                          infowindow_array[id].open(map, marker[id]);
                          old_id = id;
                      }
                   </script>
                   <style type="text/css">
                      body {
                      margin: 0;
                      padding: 0;
                      }
                   </style>
                   <body onLoad="initialize()" onUnload="GUnload()">
                      <div id="map_canvas" style="width:100%; height: 350px"></div>
                   </body>
                </div>
            </div>
            <div class="row contactList">
                <div class="col-md-8 col-sm-12 col-xs-12 pull-left infoForm">
                    <div class="wrapForm">
                        <h3 class="name-head">
                                <span>Bạn cần hỗ trợ? Hãy gửi thông tin cho chúng tôi</span>
                            </h3>
                        <form accept-charset="UTF-8" class="validate" action="" id="contact" method="post">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" name="full_name" class="form-control validate[required]" placeholder="Tên của bạn">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" name="phone" class="form-control validate[required,custom[phone]]" placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" name="email" class="form-control validate[required,custom[email]]" placeholder="Email của bạn">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="contactFormMessage" class="sr-only">Nội dung</label>
                                        <textarea required="" rows="6" name="comment" class="form-control  validate[required]" placeholder="Viết bình luận" id="contactFormMessage"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <button type="submit" name="sendcontact" class="btn submit">Gửi thông tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 pull-right infoText">
                    <div class="wrap">
                        <h3 class="name-head"><?=@$this->option->site_name?></h3>
                        <p> <?=@$this->option->shipping?> </p>
                        <ul class="info-address">
                            <li>
                                <i class="glyphicon glyphicon-map-marker"></i>
                                <span><?=@$this->option->address?></span>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-envelope"></i>
                                <span>
                                    <a href="mailto:<?=@$this->option->site_email?>"><?=@$this->option->site_email?></a>
                                </span>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-phone-alt"></i>
                                <span>
                                    <a href="tel:<?=@$this->option->hotline1?>"><?=@$this->option->hotline1?></a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end sc_detail -->