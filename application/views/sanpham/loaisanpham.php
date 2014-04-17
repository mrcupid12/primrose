<div class="content_right">
    <article class="show">
    	<div class="product">
        <div class="title"><?=$TenLoai?></div>
        <?php if(count($result) > 0 ) {?>
        <ul>
       <?php foreach($result as $itemSP) {?>
          <li>
            <div class="img"><a href="<?=base_url()?>sanpham/chitiet/<?=$itemSP->Id?>-<?=$this->unicode->change($itemSP->TenSP)?>.html"><img alt="<?=$itemSP->TenSP?>" src="<?=base_url()?><?=$itemSP->HinhDaiDien?>"  /></a></div>
            <div class="info_product">
              <div class="name"> <?=$itemSP->TenSP?></div>
              <div class="price"><?=lang('Gia')?>: <span><?=number_format($itemSP->Gia)?> vnđ</span></div>
            <!--  <div class="add_cart"></div>-->
            </div>
          </li>
          <?php }?>        
        </ul>
        <?php } else {?>
        <div class="tbData"><?=lang('tbData')?></div>
        <?php }?>
      </div>        
    </article>    
  </div>