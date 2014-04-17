<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">Welcome to Adminpanel</h1>
    <span class="pagedesc">Đây là trang quản trị website của Shop thời trang US</span>
    <ul class="hornav">
      <li class="current"><a href="#updates">Cập nhật</a></li>
    </ul>
  </div>
  <!--pageheader-->
  <!-- Begin hightchat -->


<!-- End #hightchat -->
  <div id="contentwrapper" class="contentwrapper">
    <div id="updates" class="subcontent">
      <div class="notibar announcement"> <a class="close"></a>
        <h3>Thông báo</h3>
        <p>Cẩn thận khi thao tác với dữ liệu tại trang quản trị này. Dữ liệu đã xóa đi không thể phục hồi lại được.</p>
      </div>
      <!-- notification announcement -->
      
      <div class="two_third dashboard_left">
        <div class="module_content">
          <article class="stats_graph">
            <div class="content-box-content">
              <div id="container" style="width: 700px; height: 300px; margin: 0 auto; display:block"></div>
            </div>
          </article>
          <article class="stats_overview">
            <div class="overview_today">
              <p class="overview_day">Hôm nay</p>
              <p class="overview_count"><?=$hom_nay?></p>
              <p class="overview_type">Hits</p>
            </div>
            <div class="overview_previous">
              <p class="overview_day">Hôm qua</p>
              <p class="overview_count"><?=$hom_qua?></p>
              <p class="overview_type">Hits</p>
            </div>
            <div class="overview_today">
              <p class="overview_day">Tuần này</p>
              <p class="overview_count"><?=$tuan_nay?></p>
              <p class="overview_type">Hits</p>
            </div>
            <div class="overview_previous">
              <p class="overview_day">Tháng này</p>
              <p class="overview_count"><?=$thang_nay?></p>
              <p class="overview_type">Hits</p>
            </div>
          </article>
        </div>
        <br clear="all" />
                <br clear="all" />
      </div>
      <!--two_third dashboard_left --> 
      
    </div>
    <!-- #updates --> 
    
  </div>
  <!--contentwrapper--> 
  
  <br clear="all" />
</div>
<!-- centercontent -->