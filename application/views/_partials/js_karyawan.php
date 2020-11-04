<script>
  $(function () {

    var bar_data2 = {
      data : [[1,10], [2,12], [3,8], [4,6], [5,6], [6,14], [7,10], [8,12], [9,7], [10,8], [11,11], [12,10]],
      bars: { show: true }
    }
    $.plot('#bar-chart2', [bar_data2], {
      grid  : {
        borderWidth: 1,
        borderColor: '#ffff',
        tickColor  : '#ffff'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Jan'], [2,'Feb'], [3,'Mar'], [4,'Apr'], [5,'Mei'], [6,'Jun'],[7,'Jul'], [8,'Agu'], [9,'Sep'], [10,'Okt'], [11,'Nov'], [12,'Des']]
      }
    })

    var bar_data = {
      data : [[1,10], [2,12], [3,8], [4,6], [5,6], [6,14], [7,10], [8,12], [9,7], [10,8], [11,11], [12,10]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#ffff',
        tickColor  : '#ffff'
      },
      series: {
         bars: {
          show: true, barWidth: 0.3, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Jan'], [2,'Feb'], [3,'Mar'], [4,'Apr'], [5,'Mei'], [6,'Jun'],[7,'Jul'], [8,'Agu'], [9,'Sep'], [10,'Okt'], [11,'Nov'], [12,'Des']]
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */

    // var donutData = [
    //   {
    //     label: 'Karyawan Tetap',
    //     data : 90,
    //     color: '#28a745'
    //   },
    //   {
    //     label: 'Karyawan Kontrak',
    //     data : 10,
    //     color: '#0073b7'
    //   }
    // ]
    // $.plot('#donut-chart', donutData, {
    //   series: {
    //     pie: {
    //       show       : true,
    //       radius     : 1,
    //       innerRadius: 0.5,
    //       label      : {
    //         show     : true,
    //         radius   : 2 / 3,
    //         formatter: labelFormatter,
    //         threshold: 0.1
    //       }

    //     }
    //   },
    //   legend: {
    //     show: false
    //   }
    // })
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