<script type="application/javascript">
jQuery(document).ready(function(){
	
		jQuery('#overviewselect, input:checkbox').uniform();
		
		///// SLIM SCROLL /////
		jQuery('#scroll1').slimscroll({
			color: '#666',
			size: '10px',
			width: 'auto',
			height: '175px'                  
		});
		
		///// ACCORDION /////
		jQuery('#accordion').accordion({autoHeight:  false});
	
		///// SIMPLE CHART /////
		var chart;	
		chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						zoomType: 'xy'
					},
					title: {
						text: 'Biểu đồ thống kê lượt khách truy cập trong vòng 7 ngày'
					},
					subtitle: {
						text: '(Từ <?php echo date('d-m-Y', strtotime('-6 days'))?> đến <?php echo date('d-m-Y')?>)'
					},
					xAxis: [{
						//categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
                        categories: [<?php
                        	for($i=6 ; $i>=1 ; $i--) {
								echo "'";
								echo date('d-m', strtotime("-$i days"));
								echo "', ";
							}
							
							echo "'";
							echo date('d-m');
							echo "'";							
						
						?>]
					}],
					yAxis: [{ // Primary yAxis
						labels: {
							formatter: function() {
								return this.value +'';
							},
							style: {
								color: '#89A54E'
							}
						},
						title: {
							text: '',
							style: {
								color: '#89A54E'
							}
						}
					}, { // Secondary yAxis
						title: {
							text: 'Lượt truy cập',
							style: {
								color: '#4572A7'
							}
						},
						labels: {
							formatter: function() {
								return this.value +' lượt';
							},
							style: {
								color: '#4572A7'
							}
						},
						opposite: true
					}],
					tooltip: {
						formatter: function() {
							return ''+
								this.x +': '+ this.y +
								(this.series.name == 'Lượt truy cập' ? ' lượt truy cập' : ' bài viết');
						}
					},
					legend: {
						layout: 'vertical',
						align: 'left',
						x: 70,
						verticalAlign: 'top',
						y: 30,
						floating: true,
						backgroundColor: '#FFFFFF'
					},
					series: [{
						name: 'Lượt truy cập',
						color: '#4572A7',
						type: 'column',
						yAxis: 1,
                        data:  [<?php $this->load->model('counter_model');
                        	for($i=6 ; $i>=1 ; $i--) {
								$ngay = date('Y-m-d', strtotime("-$i days"));
								echo $this->counter_model->so_luong_theo_ngay($ngay);
								echo ",";
							}
							
							$ngay = date('Y-m-d');
							echo $this->counter_model->so_luong_theo_ngay($ngay);		
					?>]
					}]
				});
		
		
	///// SWITCHING LIST FROM 3 COLUMNS TO 2 COLUMN LIST /////
	function rearrangeShortcuts() {
		if(jQuery(window).width() < 430) {
			if(jQuery('.shortcuts li.one_half').length == 0) {
				var count = 0;
				jQuery('.shortcuts li').removeAttr('class');
				jQuery('.shortcuts li').each(function(){
					jQuery(this).addClass('one_half');
					if(count%2 != 0) jQuery(this).addClass('last');
					count++;
				});	
			}
		} else {
			if(jQuery('.shortcuts li.one_half').length > 0) {
				jQuery('.shortcuts li').removeAttr('class');
			}
		}
	}
	
	rearrangeShortcuts();
	
	///// ON RESIZE WINDOW /////
	jQuery(window).resize(function(){
		rearrangeShortcuts();
	});


});
</script>