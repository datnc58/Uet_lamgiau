<meta charset="utf-8"/>

<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff; display: inline-block; width: 100%;">
        <div class="col-md-8">
            <div class="row">
                <form class="navbar-form" action="" method="post" enctype="multipart/form-data" style="width: 100%" >
                    <input type="hidden" id="id_content" value="<?php if(isset($content->id)){ echo $content->id; } ?>"/>
                    <div class="form-group" style="width:100%;">
                        <div class="col-md-4">
                            <label for="" style="margin-top: 7px" class="pull-right">Tên content</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="<?php if(isset($content->name)){ echo $content->name; }?>" name="name" id="name" style="width: 100%; border-radius: 0px"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" style="width:100%; margin-top: 20px">
                        <div class="col-md-10 col-md-push-2">
                            <label for="" style="margin-top: 7px" class="pull-left">Loại website</label>
                            <input type="hidden" name="type" id="type" value="1"/>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-8 col-md-push-4">
                            <div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" onclick="selecttype(1)"  class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Full width</a></li>
                                    <li role="presentation" onclick="selecttype(2)" ><a  href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Left - mid</a></li>
                                    <li role="presentation" onclick="selecttype(3)"><a   href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Left - mid - right</a></li>
                                    <li role="presentation" onclick="selecttype(4)" ><a  href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Mid - right</a></li>
                                </ul>
                                
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">Start</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_full_start)){ echo $content->div_full_start; }?>" name="div_full_start" id="div_full_start" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">End</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_full_end)){ echo $content->div_full_end; }?>" name="div_full_end" id="div_full_end" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">Start left</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_left_start)){ echo $content->div_left_start; }?>" name="div_left_start1" id="div_left_start1" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">End left</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_left_end)){ echo $content->div_left_end; }?>" name="div_left_end1" id="div_left_end1" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">Start mid</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_mid_start)){ echo $content->div_mid_start; }?>" name="div_mid_start1" id="div_mid_start1" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">End mid</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_mid_end)){ echo $content->div_mid_end; }?>" name="div_mid_end1" id="div_mid_end1" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="messages">
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">Start left</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_left_start)){ echo $content->div_left_start; }?>" name="div_left_start2" id="div_left_start2" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">End left</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_left_end)){ echo $content->div_left_end; }?>" name="div_left_end2" id="div_left_end2" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">Start mid</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_mid_start)){ echo $content->div_mid_start; }?>" name="div_mid_start2" id="div_mid_start2" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">End mid</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_mid_end)){ echo $content->div_mid_end; }?>" name="div_mid_end2" id="div_mid_end2" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">Start right</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_right_start)){ echo $content->div_right_start; }?>" name="div_right_start2" id="div_right_start2" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">End right</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_right_end)){ echo $content->div_right_end; }?>" name="div_right_end2" id="div_right_end2" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="settings">
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">Start mid</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_mid_start)){ echo $content->div_mid_start; }?>" name="div_mid_start3" id="div_mid_start3" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">End mid</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_mid_end)){ echo $content->div_mid_end; }?>" name="div_mid_end3" id="div_mid_end3" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">Start right</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_right_start)){ echo $content->div_right_start; }?>" name="div_right_start3" id="div_right_start3" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="width:100%; margin-top: 10px;">
                                            <div class="col-md-4">
                                                <label for="" style="margin-top: 7px" class="pull-right">End right</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if(isset($content->div_right_end)){ echo $content->div_right_end; }?>" name="div_right_end3" id="div_right_end3" style="width: 100%; border-radius: 0px"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" style="width:100%; margin-top: 20px;;">
                        <div class="col-md-4">
                            <label for="" style="margin-top: 7px" class="pull-right">Content cha</label>
                        </div>
                        <div class="col-md-8">
                            <select name="id_content" class="form-control" style="width: 100%" id="id_content">
                                <?php
                                    if(isset($content) && !empty($content)){
                                        foreach($content as $ct){ ?>
                                            <option value="<?=$ct->id; ?>"><?=$ct->name; ?></option>
                                <?php   }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" style="width:100%; margin-top: 20px;;">
                        <div class="col-md-4">
                            <label for="" style="margin-top: 7px" class="pull-right">Ảnh minh họa</label>
                        </div>
                        <div class="col-md-8">
                            <input type="file" style="width:100%;" class="form-control" name="url" id="url"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <input class="btn btn-primary pull-right " type="submit" name="themmoi" style="border-radius: 0px; margin-top: 20px;" value=" Thêm mới"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function selecttype(giatri){
        document.getElementById('type').value = giatri;
    }
</script>
<style type="text/css">
    thead {
        background: #f8f8f8;
        font-weight: bold;
    }
</style>
<!-- /.content -->
