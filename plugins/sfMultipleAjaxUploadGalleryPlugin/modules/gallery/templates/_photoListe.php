<?php use_stylesheet("../sfMultipleAjaxUploadGalleryPlugin/css/theme/".sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_csstheme")."/photos.css") ?>
<?php use_helper('I18N') ?>
<?php use_javascript("../sfMultipleAjaxUploadGalleryPlugin/js/jquery/jquery-ui-1.8.10.custom.min.js") ?>
<?php 
    $app_name = $sf_context->getConfiguration()->getApplication();
    if(strcmp($sf_context->getConfiguration()->getEnvironment(),'prod') != 0)
    {$app_name .= '_'.$sf_context->getConfiguration()->getEnvironment();}
?>
<style type="text/css">
        fieldset.optdual { width: 500px; }
        .optdual { position: relative; }
        .optdual .offset { position: absolute; left: 18em; }
        .optlist label { width: 16em; display: block; }
        #dl_links { margin-top: .5em; }
        #photos-list { list-style-type: none; margin: 0; padding: 0; }
	#photos-list li { margin: 3px 3px 3px 0; padding: 1px; float: left; font-size: 4em; text-align: center; }
	</style>

<script>
    function saveTitle(id){
        var title = $('#' + id + '_value').val();
        $.post('/<?php echo $app_name ?>.php/photos/updateTitle',
            {id: id, title : title},
            function(data){
                $('#ajax-loader').show();
                $('#sf_admin_container').prepend("<div class='notice'>"+data+"</div>");
                setTimeout(function(){
                    $("#ajax-loader").slideUp()
                }, 1000);
                $('.editable').hide();
            $('.editable').removeClass('clicked');
            });
    }

    function ajaxPhotoEdition(url){
        $.post(url,
            {},
            function(data){
                $("#pictures_list").html(data);
            });
    }

    <?php if($photos->count()>0){?>
    $(function() {
            $( "#photos-list" ).sortable({
                            handle: '.basic',
                            update: function(){
                                    $('#working').show();
                                    var order = $('#photos-list').sortable('serialize');
                                    $.post('/<?php echo $app_name ?>.php/gallery/ajaxPhotoOrder?id=<?php echo $photos->getFirst()->getGallery()->getId()?>&'+order,
                                            {},
                                            function(data){
                                                    $("#pictures_list").html(data);
                                                    $('#working').hide();
                                            });
                            }
            });
            $( "#photos-list" ).disableSelection();
        });
    <?php } ?>

</script>
<?php if ($sf_user->hasFlash('ajax_notice')): ?>
  <div class="notice"><?php echo $sf_user->getFlash('ajax_notice') ?></div>
<?php endif ?>

<?php if ($sf_user->hasFlash('ajax_error')): ?>
  <div class="error"><?php echo $sf_user->getFlash('ajax_error') ?></div>
<?php endif ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="gallery_content">
    <tr>
        <th rowspan="3"></th>
        <th class="gallery_topleft"></th>
        <td id="gallery_tbl-border-top">&nbsp;</td>
        <th class="gallery_topright"></th>
        <th rowspan="3"></th>
    </tr>
    <tr>
        <td id="gallery_tbl-border-left"></td>
        <td>
            <!--  start content-table-inner ...................................................................... START -->
            <div id="gallery_content-table-inner">

                <!--  start table-content  -->
                <div id="gallery_table-content" style="min-height: 0px;">
                    <div id="working" style="display:none; position: absolute"><img src="/sfMultipleAjaxUploadGalleryPlugin/images/theme/<?php echo sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_csstheme")?>/ajax-loader.gif" /></div>
                    <?php
                    $uploadDir = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery");
                    $webDir = sfConfig::get("sf_web_dir");
                    $upload_gallery_path = substr($uploadDir, strlen($webDir), strlen($uploadDir) - strlen($webDir));
                    $sizes = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_thumbnails_sizes");
                    foreach ($sizes as $i=>$size) {
                        if($size>50){
                            break;
                        }
                    }

                    if($photos->count() > 0){ ?>

                    <table id="maintable">
                            <tr>
                                <td style="width: 20%">
                                    <table class="mediumtable">
                                            <tr>
                                                <th rowspan="3"></th>
                                                <th class="topleft"></th>
                                                <td class="tbl-border-top">&nbsp;</td>
                                                <th class="topright"></th>
                                                <th rowspan="3"></th>
                                            </tr>
                                            <tr>
                                            <td class="tbl-border-left"></td>
                                            <td>
                                                <div style="text-align: center">
                                                    <img src="<?php echo sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_defaultPicture");?>"/>
                                                    <h1><?php echo 'Edicion de la foto'; ?></h1>
                                                </div>
                                                <div class="photo_action_full" style="height: 150px"><?php echo __("Cliquez sur la photo que vous désirez modifier")?></div>
                                                <?php foreach( $photos as $i=>$photo ){
                                                    include_partial("gallery/actions", array("photo"=>$photo,"contextual"=>false));
                                                }?>
                                            </td>
                                            <td class="tbl-border-right"></td>
                                            </tr>
                                            <tr>
                                                <th class="bottomleft"></th>
                                                <td class="tbl-border-bottom">&nbsp;</td>
                                                <th class="bottomright"></th>
                                            </tr>
                                    </table>
                                </td>
                                <td id="photo_list">
                                    <table class="mediumtable">
                                            <tr>
                                                <th rowspan="3"></th>
                                                <th class="topleft"></th>
                                                <td class="tbl-border-top">&nbsp;</td>
                                                <th class="topright"></th>
                                                <th rowspan="3"></th>
                                            </tr>
                                            <tr>
                                            <td class="tbl-border-left"></td>
                                            <td>
                                                <ul id="photos-list">
                                                    <?php foreach( $photos as $i=>$photo ){ ?>
                                                        <li id="photo_elt_<?php echo $photo->getId()?>" class="photo-elt" style="float:left;list-style-type:none;min-width:100px;">
                                                        <div id="photo-<?php echo $photo->getId()?>" class="picture" onclick="$('.photo_action_full').hide();$('#actions_<?php echo $photo->getId() ?>').toggle();" onmouseover="$(this).find('.actions #contextual_actions_<?php echo $photo->getId() ?>').show();" onmouseout="$(this).find('.actions #contextual_actions_<?php echo $photo->getId() ?>').hide();">
                                                            <?php if($photo->getIsDefault()){ ?> <div id="default" title="Seleccione la foto como favorita para que aparesca como foto inicial del album"></div><?php } ?>
                                                            <img class="basic" src="<?php echo $upload_gallery_path.$photo->getGallery()->getSlug()."/".$size."/".$photo->getPicpath(); ?>"/>
                                                          <div class="actions">
                                                              <?php include_partial("gallery/actions", array("photo"=>$photo,"contextual"=>true)); ?>

                                                          </div>
                                                        </div>
                                                            </li>
                                                    <?php } ?>
                                                </ul>
                                            </td>
                                            <td class="tbl-border-right"></td>
                                            </tr>
                                            <tr>
                                                <th class="bottomleft"></th>
                                                <td class="tbl-border-bottom">&nbsp;</td>
                                                <th class="bottomright"></th>
                                            </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    <?php }else{ ?>
                    <p>Arrastre aquí desde su carpeta las fotos para cargar en su album</p>
                    <?php } ?>
                </div>
                <!--  end table-content  -->

                <div class="clear"></div>

            </div>
            <!--  end content-table-inner ............................................END  -->
        </td>
        <td id="gallery_tbl-border-right"></td>
    </tr>
    <tr>
        <th class="gallery_sized bottomleft"></th>
        <td id="gallery_tbl-border-bottom">&nbsp;</td>
        <th class="gallery_sized bottomright"></th>
    </tr>
</table><br/>

