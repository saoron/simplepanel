            <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
				     <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                      סטטיסטיקת כניסות
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="area_chart">
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			<script>
			      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['שבוע', 'מבקרים'],
          ['<?=translate(date("l",strtotime('-6 days', time())));?>',<?= $visits[date("d",strtotime('-6 days', time()))]?$visits[date("d",strtotime('-6 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-5 days', time())));?>',  <?= $visits[date("d",strtotime('-5 days', time()))]?$visits[date("d",strtotime('-5 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-4 days', time())));?>',<?= $visits[date("d",strtotime('-4 days', time()))]?$visits[date("d",strtotime('-4 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-3 days', time())));?>',<?= $visits[date("d",strtotime('-3 days', time()))]?$visits[date("d",strtotime('-3 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-2 days', time())));?>',<?= $visits[date("d",strtotime('-2 days', time()))]?$visits[date("d",strtotime('-2 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-1 days', time())));?>', <?= $visits[date("d",strtotime('-1 days', time()))]?$visits[date("d",strtotime('-1 days', time()))]:0;?>],
          ['<?=translate(date("l",time()));?>',  <?= $visits[date("d",time())];?>]
        ]);

        var options = {
          width: 'auto',
          height: '160',
          backgroundColor: 'transparent',
          colors: ['#ed6d49', '#0daed3'],
          tooltip: {
            textStyle: {
              color: '#666666',
              fontSize: 11
            },
            showColorCode: true
          },
          legend: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          chartArea: {
            left: 100,
            top: 10
          },
          focusTarget: 'category',
          hAxis: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          vAxis: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          pointSize: 6,
          chartArea: {
            left: 60,
            top: 10,
            height: '80%'
          },
          lineWidth: 1,
        };

        var chart = new google.visualization.LineChart(document.getElementById('area_chart'));
        chart.draw(data, options);
      }
			</script>