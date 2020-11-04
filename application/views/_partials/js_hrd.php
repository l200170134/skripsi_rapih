<script>
  $(function () {

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9], [7,5], [8,10], [9,8], [10,20]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Direksi'], [2,'HRD GA'], [3,'Marketing'], [4,'Purchasing'], [5,'Gudang'], [6,'Armada'],[7,'Teknisi'], [8,'IT'], [9,'Recivable'], [10,'Finance Accointing']]
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      {
        label: 'Karyawan Tetap',
        data : 90,
        color: '#28a745'
      },
      {
        label: 'Karyawan Kontrak',
        data : 10,
        color: '#0073b7'
      }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>