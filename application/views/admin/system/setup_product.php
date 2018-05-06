<?php

#****************************************#

# * @Author: Tran Manh                   #

# * @Email: dangtranmanh051187@gmail.com #

# * @Website: http://qts.com             #

# * @Copyright: 2017 - 2018              #

#****************************************#

?>



<section class="content-header">

    <h1>

       Cấu hình sản phẩm

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('uetadmin/admin/setup_product')?>">Cấu hình thuộc tính sản phẩm</a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="box">
        <!-- /.box-header -->
        <div class="panel panel-default">
           <div class="panel-heading">
              <div class="alert alert-dismissible" style="display:none;"></div>
              <ul class="nav nav-tabs">
                 <li class="active"><a data-toggle="tab" href="#home">Thuộc tính </a></li>
                 <li><a data-toggle="tab" href="#menu1">Các nút tích</a></li>
                 <li><a data-toggle="tab" href="#menu2">Các trường trong cấu hình</a></li>
                 <li><a data-toggle="tab" href="#menu3">Cấu hình menu</a></li>
                 <li><a data-toggle="tab" href="#menu4">Cấu hình banner</a></li>
              </ul>
           </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="box-header">
                        <a href="javascript:void(0);" onclick="getModal_attpro()" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Thêm mới
                        </a> 
                    </div>
                    <form name="formbk" method="post" action="">
                        <table id="example" class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="2%" class="no-sort">STT</th>

                                    <th width="15%">Tên thuộc tính</th>
                                    <th width="4%" class="no-sort text-center">Loại</th>

                                    <th width="3%" class="no-sort text-center">Sắp xếp</th>

                                    <th width="5%" class="no-sort text-center">Action</th>

                                </tr>

                            </thead>

                            <tbody>
                                 <?php if (isset($thuoctinh)) {
                                    $stt=0;
                                    foreach ($thuoctinh as $key=>$v) { $stt++;
                                        ?>
                                <tr>
                                     <td><?=$stt;?></td>
                                     <td><?=@$v->name?></td>
                                    <td class="text-center"><?=@$v->type?></td>
                                    <td class="text-center"><?=@$v->sort?>
                                    </td>
                                    <td class="text-center">
                                       <div class="btn-group">
                                            <a onclick="getModal_edit_attpro(<?=$key?>)"
                                        class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
                                          <a href="<?= base_url('uetadmin/admin/xoa_thuoctinh/' . $key) ?>"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-xs btn-default" title="Sửa"><i class="glyphicon glyphicon-trash"></i></a> 
                                        </div>
                                    </td>
                                </tr>
                                <?php }  } ?>
                            </tbody>

                        </table>
                    </form>    
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="box-header">
                        <a href="javascript:void(0);" onclick="getModal_button_show()" class="btn btn-success btn-sm">

                        <i class="fa fa-plus"></i> Thêm mới nút

                        </a> 
                    </div>
                    <form name="formbk" method="post" action="">
                        <table id="example" class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="2%" class="no-sort">STT</th>
                                    <th width="15%">Tên check box</th>
                                    <th width="7%" class="no-sort text-center">module áp dụng</th>
                                    <th width="4%" class="no-sort text-center">Tên trường</th>
                                    <th width="3%" class="no-sort text-center"> Mã màu</th>
                                    <th width="3%" class="no-sort text-center"> Hiện thị </th>
                                    <th width="5%" class="no-sort text-center"> Hoạt động </th>
                                </tr>

                            </thead>

                            <tbody>
                                 <?php if (isset($show_button)) {
                                    $stt=0;
                                    foreach ($show_button as $key=>$v) { $stt++;
                                        ?>
                                <tr>
                                    <td class="text-center"><?=$stt;?></td>
                                     <td><?=@$v->name?></td>
                                     <td class="text-center"><?=@$v->type?></td>
                                    <td class="text-center"><?=@$v->field?></td>
                                    <td class="text-center"><?=@$v->color?>
                                    </td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=$v->id;?>" data-placement="config_checkpro" data-view="active">
                                            <input type="checkbox" <?=$v->active==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                    <td class="text-center">
                                       <div class="btn-group">
                                            <a onclick="getModal_edit_showbut(<?=@$v->id?>)"
                                        class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
                                          <a href="<?= base_url('uetadmin/admin/xoa_showbut/' .$v->id) ?>"
                                         onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-xs btn-default" title="Sửa"><i class="glyphicon glyphicon-trash"></i></a> 
                                        </div>
                                    </td>
                                </tr>
                                <?php }  } ?>
                            </tbody>

                        </table>
                    </form> 
                </div>
                 <div id="menu2" class="tab-pane fade">
                    <form name="formbk" method="post" action="">
                        <table id="example" class="table table-bordered table-striped">

                            <thead>

                                <tr>
                                    <th width="2%" class="text-center no-sort">STT</th>
                                    <th width="15%">Tên hiển thị</th>
                                    <th width="4%" class="no-sort text-center">Tên trường</th>
                                    <th width="1%" class="no-sort text-center"> Hiện thị </th>
                                </tr>

                            </thead>

                            <tbody>
                                
                                <tr>
                                    <td class="text-center">1</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_title" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_title"
                                    value="<?=@$config_text->site_title?>" placeholder=""/></td>
                                     <td class="text-center">site_title</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_title">
                                            <input type="checkbox" <?=@$config_home->site_title==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                     <td>
                                        <input type="text" data-id="<?=@$config_text->id ?>" data-view="site_name" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_name"
                                    value="<?=@$config_text->site_name?>" placeholder=""/>
                                        </td>
                                     <td class="text-center">site_name</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_name">
                                            <input type="checkbox" <?=@$config_home->site_name==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="timeopen" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="timeopen"
                                    value="<?=@$config_text->timeopen?>" placeholder=""/></td>
                                     <td class="text-center">timeopen</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="timeopen">
                                            <input type="checkbox" <?=@$config_home->timeopen==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">4</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="slogan" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="slogan"
                                    value="<?=@$config_text->slogan?>" placeholder=""/></td>
                                     <td class="text-center">slogan</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="slogan">
                                            <input type="checkbox" <?=@$config_home->slogan==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_video" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_video"
                                    value="<?=@$config_text->site_video?>" placeholder=""/></td>
                                     <td class="text-center">site_video</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_video">
                                            <input type="checkbox" <?=@$config_home->site_video==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="map_iframe" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="map_iframe"
                                    value="<?=@$config_text->map_iframe?>" placeholder=""/></td>
                                     <td class="text-center">map_iframe</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="map_iframe">
                                            <input type="checkbox" <?=@$config_home->map_iframe==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="shipping" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="shipping"
                                    value="<?=@$config_text->shipping?>" placeholder=""/></td>
                                     <td class="text-center">shipping</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="shipping">
                                            <input type="checkbox" <?=@$config_home->shipping==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">8</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="map_footer" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="chat"
                                    value="<?=@$config_text->map_footer?>" placeholder=""/></td>
                                     <td class="text-center">map_footer</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="map_footer">
                                            <input type="checkbox" <?=@$config_home->map_footer==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">9</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="coppy_right" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="coppy_right"
                                    value="<?=@$config_text->coppy_right?>" placeholder=""/></td>
                                     <td class="text-center">coppy_right</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="coppy_right">
                                            <input type="checkbox" <?=@$config_home->coppy_right==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">10</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="domain" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="domain"
                                    value="<?=@$config_text->domain?>" placeholder=""/></td>
                                     <td class="text-center">domain</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="domain">
                                            <input type="checkbox" <?=@$config_home->domain==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">11</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_logo_footer" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_logo_footer"
                                    value="<?=@$config_text->site_logo_footer?>" placeholder=""/></td>
                                     <td class="text-center">site_logo_footer</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_logo_footer">
                                            <input type="checkbox" <?=@$config_home->site_logo_footer==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">12</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="WM_text" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="WM_text"
                                    value="<?=@$config_text->WM_text?>" placeholder=""/></td>
                                     <td class="text-center">WM_text</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="WM_text">
                                            <input type="checkbox" <?=@$config_home->WM_text==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">13</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="WM_color" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="WM_color"
                                    value="<?=@$config_text->WM_color?>" placeholder=""/></td>
                                     <td class="text-center">WM_color</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="WM_color">
                                            <input type="checkbox" <?=@$config_home->WM_color==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">14</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="WM_size" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="WM_size"
                                    value="<?=@$config_text->WM_size?>" placeholder=""/></td>
                                     <td class="text-center">WM_size</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="WM_size">
                                            <input type="checkbox" <?=@$config_home->WM_size==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">15</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="input_text_1" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="input_text_1"
                                    value="<?=@$config_text->input_text_1?>" placeholder=""/></td>
                                     <td class="text-center">input_text_1</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="input_text_1">
                                            <input type="checkbox" <?=@$config_home->input_text_1==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">16</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="face_id" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="face_id"
                                    value="<?=@$config_text->face_id?>" placeholder=""/></td>
                                     <td class="text-center">face_id</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="face_id">
                                            <input type="checkbox" <?=@$config_home->face_id==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">17</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_fanpage" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_fanpage"
                                    value="<?=@$config_text->site_fanpage?>" placeholder=""/></td>
                                     <td class="text-center">site_fanpage</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_fanpage">
                                            <input type="checkbox" <?=@$config_home->site_fanpage==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">18</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_gg" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_gg"
                                    value="<?=@$config_text->link_gg?>" placeholder=""/></td>
                                     <td class="text-center">link_gg</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_gg">
                                            <input type="checkbox" <?=@$config_home->link_gg==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">19</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_printer" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_printer"
                                    value="<?=@$config_text->link_printer?>" placeholder=""/></td>
                                     <td class="text-center">link_printer</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_printer">
                                            <input type="checkbox" <?=@$config_home->link_printer==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">20</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_linkedin" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_linkedin"
                                    value="<?=@$config_text->link_linkedin?>" placeholder=""/></td>
                                     <td class="text-center">link_linkedin</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_linkedin">
                                            <input type="checkbox" <?=@$config_home->link_linkedin==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">22</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_tt" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_tt"
                                    value="<?=@$config_text->link_tt?>" placeholder=""/></td>
                                     <td class="text-center">link_tt</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_tt">
                                            <input type="checkbox" <?=@$config_home->link_tt==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">22</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_sky" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_sky"
                                    value="<?=@$config_text->link_sky?>" placeholder=""/></td>
                                     <td class="text-center">link_sky</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_sky">
                                            <input type="checkbox" <?=@$config_home->link_sky==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">23</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="link_instagram" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_instagram"
                                    value="<?=@$config_text->link_instagram?>" placeholder=""/></td>
                                     <td class="text-center">link_instagram</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="link_instagram">
                                            <input type="checkbox" <?=@$config_home->link_instagram==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">24</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="hotline1" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="link_tt"
                                    value="<?=@$config_text->hotline1?>" placeholder=""/></td>
                                     <td class="text-center">hotline1</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="hotline1">
                                            <input type="checkbox" <?=@$config_home->hotline1==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">25</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="hotline2" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="hotline2"
                                    value="<?=@$config_text->hotline2?>" placeholder=""/></td>
                                     <td class="text-center">hotline2</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="hotline2">
                                            <input type="checkbox" <?=@$config_home->hotline2==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">26</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="hotline3" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="hotline3"
                                    value="<?=@$config_text->hotline3?>" placeholder=""/></td>
                                     <td class="text-center">hotline3</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="hotline3">
                                            <input type="checkbox" <?=@$config_home->hotline3==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                 <tr><td class="text-center">27</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="site_promo" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="site_promo"
                                    value="<?=@$config_text->site_promo?>" placeholder=""/></td>
                                     <td class="text-center">site_promo</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="site_promo">
                                            <input type="checkbox" <?=@$config_home->site_promo==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">28</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="address" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="address"
                                    value="<?=@$config_text->address?>" placeholder=""/></td>
                                     <td class="text-center">address</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="address">
                                            <input type="checkbox" <?=@$config_home->address==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <tr><td class="text-center">29</td>
                                     <td><input type="text" data-id="<?=@$config_text->id ?>" data-view="chat" data-placement="site_option" class="form-control input-sm " oninput="update_value($(this))" name="chat"
                                    value="<?=@$config_text->chat?>" placeholder=""/></td>
                                     <td class="text-center">chat</td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=@$config_home->id;?>" data-placement="site_option" data-view="chat">
                                            <input type="checkbox" <?=@$config_home->chat==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                
                            </tbody>

                        </table>
                    </form> 
                 </div>
                 <div id="menu3" class="tab-pane fade">
                 <?= $this->load->views('admin/system/setup_menu'); ?>
                </div>
                <div id="menu4" class="tab-pane fade">
                 <?= $this->load->views('admin/system/setup_banner'); ?>
                </div>
            </div>
        </div>

    </div>

</section>
<link href="<?=base_url('assets/css_admin/back_end/bootstrap-toggle.min.css')?>" rel="stylesheet">

<script src="<?=base_url('assets/js_admin/bootstrap-toggle.min.js')?>"></script>

<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script src="<?=base_url('assets/js_admin/general_add.js')?>"></script>
<script>
    // them thuoc tính sản phẩm
    function getModal_attpro() {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'uetadmin/admin/popupdata_attpro',
            data: "",
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    // sưa thuoc tính sản phẩm
    function getModal_edit_attpro(key) {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'uetadmin/admin/popupdata_attpro',
            data: "key=" + key,
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    // them nút hiện thị 
    function getModal_button_show() {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'uetadmin/admin/popupdata_butshow',
            data: "",
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }
    // sưa button
    function getModal_edit_showbut(id) {
        $('.modal').remove();
        $.ajax({
            type: "GET",
            dataType:"html",
            url: base_url() + 'uetadmin/admin/popupdata_butshow',
            data: "id=" + id,
            success: function (ketqua) {
                $('body').append(ketqua);
                $("#myModal").modal();
            }
        })
    }

</script>
