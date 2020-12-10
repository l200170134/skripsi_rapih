<script>
  $(function() {

    /*
     * BAR CHART
     * ---------
     */
    <?php
    $direksi = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 1")->row_array();
    $hrd = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 2")->row_array();
    $marketing = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 3")->row_array();
    $purchasing = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 4")->row_array();
    $gudang = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 5")->row_array();
    $armada = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 6")->row_array();
    $teknisi = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 7")->row_array();
    $it = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 8")->row_array();
    $Recive = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 9")->row_array();
    $finnance = $this->db->query("SELECT COUNT(nip) as jum FROM user WHERE id_divisi = 10")->row_array();
    ?>

    var bar_data = {
      data: [
        [1, <?php echo $direksi['jum']; ?>],
        [2, <?php echo $hrd['jum']; ?>],
        [3, <?php echo $marketing['jum']; ?>],
        [4, <?php echo $purchasing['jum']; ?>],
        [5, <?php echo $gudang['jum']; ?>],
        [6, <?php echo $armada['jum']; ?>],
        [7, <?php echo $teknisi['jum']; ?>],
        [8, <?php echo $it['jum']; ?>],
        [9, <?php echo $Recive['jum']; ?>],
        [10, <?php echo $finnance['jum']; ?>]
      ],
      bars: {
        show: true
      }
    }
    $.plot('#bar-chart', [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor: '#f3f3f3'
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis: {
        ticks: [
          [1, 'Direksi'],
          [2, 'HRD GA'],
          [3, 'Marketing'],
          [4, 'Purchasing'],
          [5, 'Gudang'],
          [6, 'Armada'],
          [7, 'Teknisi'],
          [8, 'IT'],
          [9, 'Recivable'],
          [10, 'Finance Accointing']
        ]
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [{
        label: 'Karyawan Tetap',
        data: 90,
        color: '#28a745'
      },
      {
        label: 'Karyawan Kontrak',
        data: 10,
        color: '#0073b7'
      }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2 / 3,
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
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
      label +
      '<br>' +
      Math.round(series.percent) + '%</div>'
  }
</script>