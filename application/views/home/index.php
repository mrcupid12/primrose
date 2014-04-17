<div class="content_right">
    <div class="info">
      <div class="text_header">Primrose <span>USA</span></div>
      <div class="content"><?=$text->NoiDung?> </div>
      <div class="img"><img src="statics/images/info.jpg" alt="" /></div>
    </div>
    <div class="show">
    <?php foreach($result as $item) {?>     
        <?php $tmp = $this->public_model->GetSanPhamNoiBat($item->Id,$lang);?>
        <?php if(count($tmp) > 0 ){ ?>
      <div class="product">
        <div class="title"><?=$item->Ten?></div>
        <ul>
        <?php foreach($tmp as $itemSP) {?>
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
      </div>
      <?php }?>
      <?php }?>
    </div>
  </div>