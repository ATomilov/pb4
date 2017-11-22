<div class="ol-asset-index dark">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <?php $cnt = 0;?>
        <?php foreach($olAssetsIndex as $group=>$data):?>
            <li role="presentation" class="<?php echo $cnt == 0 ? 'active' : ''; ?>" ><a href="#<?php echo $group;?>" aria-controls="<?php echo $group;?>" role="tab" data-toggle="tab"><i class="icon-<?php echo strtolower($group) ?>-assets"></i><?php echo $group;?></a></li>
            <?php $cnt++;?>
        <?php endforeach;?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <?php $cnt = 0;?>
        <?php foreach($olAssetsIndex as $group=>$assets):?>
            <div role="tabpanel" class="tab-pane <?php echo $cnt == 0 ? 'active' : ''; ?>" id="<?php echo $group;?>" >
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php $assetnum = 0;?>
                    <?php foreach($assets as $asset):?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne<?php echo $asset->id;?>">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $asset->id;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $asset->id;?>">
                                        <?php echo $asset->name;?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne<?php echo $asset->id;?>" class="panel-collapse collapse <?php echo $assetnum == 0 ? 'in' : ''; ?>" role="tabpanel" aria-labelledby="headingOne<?php echo $asset->id;?>">
                                <div class="panel-body">
                                    <?php echo apply_filters('the_content', $asset->description);?>
                                    <?php if($asset->trading_hours):?>
                                        <div class="extra-info">
                                            <p><strong><?php echo _e("Trading hours", 'ol_plugin');?>: </strong><?php echo $asset->trading_hours;?></p>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <?php $assetnum++;?>
                    <?php endforeach;?>
                </div>
            </div>
            <?php $cnt++;?>
        <?php endforeach;?>
    </div>

</div>