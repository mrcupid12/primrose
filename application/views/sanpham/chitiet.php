<div class="content_right">
    <article class="show">
    	<div class="detail_left">
        <?php if(count($Hinh) > 0) {?>
        <div class="big_photo"> <a class="view" href="<?=base_url()?><?=$Hinh[0]->UrlHinh?>"><img  src="<?=base_url()?><?=$Hinh[0]->UrlHinh?>" alt="" /></a> </div>
        <div class="list_thumb">
          <ul>
        <?php foreach($Hinh as $itemHinh) { ?>
            <li><a class="group4" href="<?=base_url()?><?=$itemHinh->UrlHinh?>"><img src="<?=base_url()?><?=$itemHinh->UrlHinh?>" alt="" /></a></li>
        <?php }?>
          </ul>
        </div>
        <?php }?>
      </div>
      <?php foreach($result as $item) { ?>
      <div class="detail_right">
        <h4><?=$item->TenSP?></h4>
        <div class="price"><?=lang('Gia')?>: <span><?=number_format($item->Gia)?> vnđ</span></div>
        <div class="des">
          <p><?=$item->TomTat?></p>
        </div>
        <?php /*?><div class="add_cart">Thêm vào giỏ hàng</div><?php */?>
      </div>
        <div class="detail_des"><?=$item->MoTa?></div>
        <?php }?>
    </article>  
    <article class="show">
    	<div class="product">
        <div class="title"><?=lang('sanphamcungloai')?></div>
        <ul class="center">
        <?php foreach($SPCungLoai as $itemSP) {?>
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
        
    </article>  
  </div>