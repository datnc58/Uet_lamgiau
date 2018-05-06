    <div class="clearfix"></div>
    <div class="banner">
        <div class="banner_cate">
            <div class="container">
                <div class="row_pc">
                    <div class="sub_bn_cate">
                        <div class="tit_bn_cate pull-left"><h1><?=lang('user-mana');?></h1></div>
                        <div class="back_link pull-right">
                            <ul>
                                <li><a href="<?=base_url()?>"><?=lang('home');?></a></li>
                                <li><a href=""><?=lang('user-mana');?></a></li>

                            </ul>
                        </div>
                        <div class="clearfix clearfix-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearix clearfix-30"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-775 col-lg-push-225 col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="qts_right_content">
                        <div class="baoho_laodong">
                            <h2 class="tit_thuongmai"><span><?=lang('yourdetail');?></span></h2>
                            <div class="clearix clearfix-30"></div>
                            <div class="row_pc">
                                <div class="col-md-12 col-sm-12- col-xs-12">
                                    <form action="<?= base_url('thong-tin-tai-khoan')?>" method="post" class="validate form-horizontal" enctype="multipart/form-data" role="form">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="col-sm-3"><?=lang('account');?></label>
                                                <label class="col-sm-9"><?=@$user_item->email;?></label>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3"><?=lang('name');?></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="validate[required] form-control input-sm " name="fullname"
                                                           value="<?=@$user_item->fullname;?>" placeholder=""/>
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group" style="display: none">
                                                <label class="col-sm-3">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="validate[required] form-control input-sm " name="email"
                                                           value="<?= @$user_item->email; ?>" placeholder=""/>
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3"><?=lang('phone');?></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="validate[required] form-control input-sm " name="phone"
                                                           value="<?= @$user_item->phone; ?>" placeholder=""/>
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3"><?=lang('diachi');?></label>
                                                <div class="col-sm-9">
                                                    <textarea class="validate[required] form-control input-sm " name="address" placeholder=""/><?= @$user_item->address; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group" style="display: none">
                                                <label class="col-md-3">Giới tính</label>
                                                <div class="col-sm-9">
                                                    <div class="row">
                                                        <label class="checkbox-inline" style="text-transform: none">
                                                            <input type="radio" value="122" name="cate_tour[]">
                                                            Nam
                                                        </label>

                                                        <label class="checkbox-inline" style="text-transform: none">
                                                            <input type="radio" value="122" name="cate_tour[]">
                                                            Nữ
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3"><?=lang('province');?></label>
                                                <div class="col-sm-9">
                                                    <select id="location5" onclick="change_province($(this).val())" class="input-sm  form-control validate[required]" name="province">
                                                        <option value="0">--<?=lang('slect-provin');?>--</option>
                                                        <?php
                                                        foreach(@$province as $t){?>
                                                            <option <?php if($t->id == $user_item->address_province){echo 'selected="selected"';}?> value="<?=$t->id;?>" >
                                                                <?=$t->name;?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>

                                            <div class="form-group">
                                                <label class="col-sm-3">&nbsp;</label>
                                                <div class="col-sm-9">
                                                    <button name="update_profiler" type="submit"  class="btn btn-blue btn-sm pull-right" >
                                                        <div  class="button-green">
                                                            <i class="icons icon-basket-2"></i>Cập nhật
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="infor_acount clearfix col-md-12 col-sm-12"  style="border-left: 0">
                                    <h2 class="tit_thuongmai"><span><?=lang('chang-pass');?></span></h2>
                                     <div class="clearix clearfix-30"></div>
                                    <form id="form_change_pass" action="<?=base_url('users_frontend/change_pass')?>" method="post"   class="validate form-horizontal" role="form">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="col-sm-4"><?=lang('account');?></label>
                                                <label class="col-sm-8"><?=@$user_item->email;?></label>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4"><?=lang('old-pass');?></label>
                                                <div class="col-sm-8">
                                                    <div id="show_error_pass2"></div>
                                                    <input type="password" class="validate[required] form-control"
                                                           onchange="check_pass($(this).val())"
                                                           name="old_pass"  name="old_pass" placeholder="<?=lang('old-pass');?>">
                                                    <input id="pass_check" name="pass_check" value="1" type="hidden">
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4"><?=lang('new-pass');?></label>
                                                <div class="col-sm-8">
                                                    <input type="password" class=" validate[required,custom[onlyLetterNumber,minSize[6]]] form-control"
                                                           id="new_pass" name="new_pass" placeholder="<?=lang('new-pass');?>">
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4"><?=lang('re-pass');?></label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="validate[required,equals[new_pass]] form-control"
                                                           name="id" name="re_pass" placeholder="<?=lang('re-pass');?>">
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4">&nbsp;</label>
                                                <div class="col-sm-8">
                                                    <button type="button" name="update_pass" id="update_pass"  class="btn btn-blue btn-sm pull-right" >
                                                        <div class="button-green">
                                                            <i class="icons icon-basket-2"></i>Cập nhật
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                       </div>
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="clearix clearfix-5"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-225 col-lg-pull-775 col-md-3 col-sm-12 col-xs-12">
                <?=$this->load->view('users/view_left');?>
            </div>
        </div>
    </div>

<script type="text/javascript" src="<?= base_url('assets/js/front_end/user.js') ?>"></script>
<script type="text/javascript">
    $(function(){
        $('#update_pass').click(function(){
            var check_form = $('#form_change_pass').validationEngine('validate');
            if(check_form){
                $('#form_change_pass').submit();
            }
        });
    });
</script>