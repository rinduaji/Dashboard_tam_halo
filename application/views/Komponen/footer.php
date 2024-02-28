<!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  . INFOMEDIA
                </div>
              </div>
            </footer>
            <!-- / Footer -->
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->

    <script>
      var options = {
  chart: {
    height: 200,
    type: "line",
    stacked: false
  },
  dataLabels: {
    enabled: false
  },
  colors: ['#ff3e1d', '#ffab00', '#66C7F4'],
  series: [
    
    // {
    //   name: "<?=date("F",strtotime($bulan_lalu))?>",
    //   type: 'column',
    //   data: ['<?=$totalDataLastMonth['HALO+']['jumlah_call_agree']?>','<?=$totalDataLastMonth['P2P REGULER']['jumlah_call_agree']?>','<?=$totalDataLastMonth['P2P CROSS']['jumlah_call_agree']?>']
    // },
    // {
    //   name: "<?=date("F",strtotime($totalDataMonthNow['HALO+']['tanggal']))?>",
    //   type: 'column',
    //   data: ['<?=$totalDataMonthNow['HALO+']['jumlah_call_agree']?>','<?=$totalDataMonthNow['P2P REGULER']['jumlah_call_agree']?>','<?=$totalDataMonthNow['P2P CROSS']['jumlah_call_agree']?>']
    // },
    {
      name: "<?=date("F",strtotime($bulan_lalu))?>",
      type: 'column',
      data: ['<?=$totalDataLastMonth['HALO+']['jumlah_call_agree']?>','<?=$totalDataLastMonth['P2P REGULER']['jumlah_call_agree']?>','<?=$totalDataLastMonth['P2P CROSS']['jumlah_call_agree']?>']
    },
    {
      name: "<?=date("F",strtotime($totalDataMonthNow['HALO+']['tanggal']))?>",
      type: 'column',
      data: ['<?=$totalDataMonthNow['HALO+']['jumlah_call_agree']?>','<?=$totalDataMonthNow['P2P REGULER']['jumlah_call_agree']?>','<?=$totalDataMonthNow['P2P CROSS']['jumlah_call_agree']?>']
    },
    {
      name: "GROWTH <?=date("F",strtotime($totalDataMonthNow['HALO+']['tanggal']))?>",
      type: 'line',
      // data: [
      //   '<?=number_format(((($totalDataMonthNow['HALO+']['jumlah_call_agree'] - $totalDataLastMonth['HALO+']['jumlah_call_agree'])/$totalDataLastMonth['HALO+']['jumlah_call_agree'])*100),0,".",".")?>',
      //   '<?=number_format(((($totalDataMonthNow['P2P REGULER']['jumlah_call_agree'] - $totalDataLastMonth['P2P REGULER']['jumlah_call_agree'])/$totalDataLastMonth['P2P REGULER']['jumlah_call_agree'])*100),0,".",".")?>',
      //   '<?=number_format(((($totalDataMonthNow['P2P CROSS']['jumlah_call_agree'] - $totalDataLastMonth['P2P CROSS']['jumlah_call_agree'])/$totalDataLastMonth['P2P CROSS']['jumlah_call_agree'])*100),0,".",".")?>',
     // ]
      data: [0,0,0,0,0,0]
    },
  ],
  stroke: {
    width: [4, 4, 4]
  },
  plotOptions: {
    bar: {
      columnWidth: "20%"
    }
  },
  xaxis: {
    // categories: ['HALO+', 'P2P REGULER', 'P2P CROSS']
    categories: ['HALO+', 'P2P REGULER', 'P2P CROSS']
  },
  yaxis: [
    {
      seriesName: 'Column A',
      axisTicks: {
        show: true
      },
      axisBorder: {
        show: true,
      },
      title: {
        text: "Columns"
      }
    },
    {
      seriesName: 'Column A',
      show: false
    }, {
      opposite: true,
      seriesName: 'Line C',
      axisTicks: {
        show: true
      },
      axisBorder: {
        show: true,
      },
      title: {
        text: "Line"
      }
    }
  ],
  tooltip: {
    shared: false,
    intersect: true,
    x: {
      show: false
    }
  },
  legend: {
    horizontalAlign: "left",
    offsetX: 40
  }
};

var chart = new ApexCharts(document.querySelector("#chartsales"), options);

chart.render();
    </script>
    <script>
      var options = {
        chart: {
    height: 250,
    type: "line",
    stacked: false
  },
  dataLabels: {
    enabled: false
  },
  colors: ['#ff3e1d', '#ffab00', '#66C7F4'],
  series: [
    
    // {
    //   name: "<?=date("F",strtotime($bulan_lalu))?>",
    //   type: 'column',
    //   data: ['<?=number_format($totalDataLastMonth['HALO+']['ppa'],0,".",".")?>','<?=number_format($totalDataLastMonth['P2P REGULER']['ppa'],0,".",".")?>','<?=number_format($totalDataLastMonth['P2P CROSS']['ppa'],0,".",".")?>',0,".",".")?>']
    // },
    // {
    //   name: "<?=date("F",strtotime($totalDataMonthNow['HALO+']['tanggal']))?>",
    //   type: 'column',
    //   data: ['<?=number_format($totalDataMonthNow['HALO+']['ppa'],0,".",".")?>','<?=number_format($totalDataMonthNow['P2P REGULER']['ppa'],0,".",".")?>','<?=number_format($totalDataMonthNow['P2P CROSS']['ppa'],0,".",".")?>',0,".",".")?>']
    // },
    {
      name: "<?=date("F",strtotime($bulan_lalu))?>",
      type: 'column',
      data: ['<?=number_format($totalDataLastMonth['HALO+']['ppa'],0,".",".")?>','<?=number_format($totalDataLastMonth['P2P REGULER']['ppa'],0,".",".")?>','<?=number_format($totalDataLastMonth['P2P CROSS']['ppa'],0,".",".")?>',0,".",".")?>']
    },
    {
      name: "<?=date("F",strtotime($totalDataMonthNow['HALO+']['tanggal']))?>",
      type: 'column',
      data: ['<?=number_format($totalDataMonthNow['HALO+']['ppa'],0,".",".")?>','<?=number_format($totalDataMonthNow['P2P REGULER']['ppa'],0,".",".")?>','<?=number_format($totalDataMonthNow['P2P CROSS']['ppa'],0,".",".")?>',0,".",".")?>']
    },
    {
      name: "GROWTH <?=date("F",strtotime($totalDataMonthNow['HALO+']['tanggal']))?>",
      type: 'line',
      // data: [
      //   '<?=number_format(((($totalDataMonthNow['HALO+']['ppa'] - $totalDataLastMonth['HALO+']['ppa'])/$totalDataLastMonth['HALO+']['ppa'])*100),0,".",".")?>',
      //   '<?=number_format(((($totalDataMonthNow['P2P REGULER']['ppa'] - $totalDataLastMonth['P2P REGULER']['ppa'])/$totalDataLastMonth['P2P REGULER']['ppa'])*100),0,".",".")?>',
      //   '<?=number_format(((($totalDataMonthNow['P2P CROSS']['ppa'] - $totalDataLastMonth['P2P CROSS']['ppa'])/$totalDataLastMonth['P2P CROSS']['ppa'])*100),0,".",".")?>',
      // ]
      data: [0,0,0,0,0,0]
    },
  ],
  stroke: {
    width: [4, 4, 4]
  },
  plotOptions: {
    bar: {
      columnWidth: "20%"
    }
  },
  xaxis: {
    // categories: ['HALO+', 'P2P REGULER', 'P2P CROSS']
    categories: ['HALO+', 'P2P REGULER', 'P2P CROSS']
  },
  yaxis: [
    {
      seriesName: 'Column A',
      axisTicks: {
        show: true
      },
      axisBorder: {
        show: true,
      },
      title: {
        text: "Columns"
      }
    },
    {
      seriesName: 'Column A',
      show: false
    }, {
      opposite: true,
      seriesName: 'Line C',
      axisTicks: {
        show: true
      },
      axisBorder: {
        show: true,
      },
      title: {
        text: "Line"
      }
    }
  ],
  tooltip: {
    shared: false,
    intersect: true,
    x: {
      show: false
    }
  },
  legend: {
    horizontalAlign: "left",
    offsetX: 40
  }
};
var chart = new ApexCharts(document.querySelector("#chartppa"), options);

chart.render();
    </script>

<script>
    // $(document).ready(function() {
    //   //jika data sudah siap maka akan dijalangkan
    //   report();
    //   $("#area").change(function(){
    //     // ini dijalankan ketika ada event dari combo box
    //     report();
    //   });
    // });

    // function report() {
    //   var area = $("#area").val();
    //   $.ajax({
    //     url : "<?= base_url('Dashboard') ?>",
    //     data: "area=" + area,
    //     success:function(data) {
    //       $("#report tbody").html(data);
    //     }
    //   });
    // }
    'use strict';

(function () {
  let cardColor, headingColor, axisColor, shadeColor, borderColor;

  cardColor = config.colors.white;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;

  // Total Revenue Report Chart - Bar Chart
  // --------------------------------------------------------------------
  const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
    totalRevenueChartOptions = {
      series: [
        // {
        //   name: "<?=date("F Y",strtotime($totalDataMonthNow['HALO+']['tanggal']))?>",
        //   data: ['<?=$totalDataMonthNow['HALO+']['revenue']?>','<?=$totalDataMonthNow['P2P REGULER']['revenue']?>','<?=$totalDataMonthNow['P2P CROSS']['revenue']?>']
        // },
        // {
        //   name: "<?=date("F Y",strtotime($bulan_lalu))?>",
        //   data: ['<?=$totalDataLastMonth['HALO+']['revenue']?>','<?=$totalDataLastMonth['P2P REGULER']['revenue']?>','<?=$totalDataLastMonth['P2P CROSS']['revenue']?>']
        // }
        {
          name: "<?=date("F Y",strtotime($totalDataMonthNow['HALO+']['tanggal']))?>",
          data: ['<?=$totalDataMonthNow['HALO+']['revenue']?>','<?=$totalDataMonthNow['P2P REGULER']['revenue']?>','<?=$totalDataMonthNow['P2P CROSS']['revenue']?>']
        },
        {
          name: "<?=date("F Y",strtotime($bulan_lalu))?>",
          data: ['<?=$totalDataLastMonth['HALO+']['revenue']?>','<?=$totalDataLastMonth['P2P REGULER']['revenue']?>','<?=$totalDataLastMonth['P2P CROSS']['revenue']?>']
        }
      ],
      chart: {
        height: 250,
        stacked: true,
        type: 'bar',
        toolbar: { show: false }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '33%',
          borderRadius: 12,
          startingShape: 'rounded',
          endingShape: 'rounded'
        }
      },
      colors: [config.colors.primary, config.colors.info],
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 6,
        lineCap: 'round',
        colors: [cardColor]
      },
      legend: {
        show: true,
        horizontalAlign: 'left',
        position: 'top',
        markers: {
          height: 8,
          width: 8,
          radius: 12,
          offsetX: -3
        },
        labels: {
          colors: axisColor
        },
        itemMargin: {
          horizontal: 10
        }
      },
      grid: {
        borderColor: borderColor,
        padding: {
          top: 0,
          bottom: -8,
          left: 20,
          right: 20
        }
      },
      xaxis: {
        // categories: ['HALO+', 'P2P REGULER', 'P2P CROSS'],
        categories: ['HALO+', 'P2P REGULER', 'P2P CROSS'],
        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        }
      },
      responsive: [
        {
          breakpoint: 1700,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '32%'
              }
            }
          }
        },
        {
          breakpoint: 1580,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '35%'
              }
            }
          }
        },
        {
          breakpoint: 1440,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '42%'
              }
            }
          }
        },
        {
          breakpoint: 1300,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 1040,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 11,
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 991,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 840,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '35%'
              }
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '28%'
              }
            }
          }
        },
        {
          breakpoint: 640,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '32%'
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '37%'
              }
            }
          }
        },
        {
          breakpoint: 480,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '45%'
              }
            }
          }
        },
        {
          breakpoint: 420,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '52%'
              }
            }
          }
        },
        {
          breakpoint: 380,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '60%'
              }
            }
          }
        }
      ],
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
  }

  // if(isFinite(<?=number_format(((($totalDataMonthNow['HALO+']['revenue'] - $totalDataLastMonth['HALO+']['revenue'])/$totalDataLastMonth['HALO+']['revenue'])*100),0,".",".")?>)){
  //   nilaiGrowth = 0;
  // }
  // else {
  //   nilaiGrowth = <?=number_format(((($totalDataMonthNow['HALO+']['revenue'] - $totalDataLastMonth['HALO+']['revenue'])/$totalDataLastMonth['HALO+']['revenue'])*100),0,".",".")?>;
  // }
  // console.log(<?=1/$totalDataLastMonth['HALO+']['revenue']?>);
  // Growth Chart - Radial Bar Chart
  // --------------------------------------------------------------------
  const lastMonth = <?=$totalDataLastMonth['P2P REGULER']['revenue']+$totalDataLastMonth['HALO+']['revenue']+$totalDataLastMonth['P2P CROSS']['revenue']+$totalDataLastMonth['SMOOA']['revenue']+$totalDataLastMonth['OTT']['revenue']+$totalDataLastMonth['Bundling Netflix']['revenue']+$totalDataLastMonth['UG Arpu =< 100rb']['revenue']?>;
  const thisMonth = <?=$totalDataMonthNow['P2P REGULER']['revenue']+$totalDataMonthNow['HALO+']['revenue']+$totalDataMonthNow['P2P CROSS']['revenue']+$totalDataMonthNow['SMOOA']['revenue']+$totalDataMonthNow['OTT']['revenue']+$totalDataMonthNow['Bundling Netflix']['revenue']+$totalDataMonthNow['UG Arpu =< 100rb']['revenue']?>;
  const nilaiGrowth = ((thisMonth / lastMonth) * 100).toFixed(2);
  const growthChartEl = document.querySelector('#growthChart'),
    growthChartOptions = {
      series: [nilaiGrowth],
      // series: [0],
      labels: ['Growth'],
      chart: {
        height: 240,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          size: 150,
          offsetY: 10,
          startAngle: -150,
          endAngle: 150,
          hollow: {
            size: '55%'
          },
          track: {
            background: cardColor,
            strokeWidth: '100%'
          },
          dataLabels: {
            name: {
              offsetY: 15,
              color: headingColor,
              fontSize: '15px',
              fontWeight: '600',
              fontFamily: 'Public Sans'
            },
            value: {
              offsetY: -25,
              color: headingColor,
              fontSize: '22px',
              fontWeight: '500',
              fontFamily: 'Public Sans'
            }
          }
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          shadeIntensity: 0.5,
          gradientToColors: [config.colors.primary],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 0.6,
          stops: [30, 70, 100]
        }
      },
      stroke: {
        dashArray: 5
      },
      grid: {
        padding: {
          top: -35,
          bottom: -10
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof growthChartEl !== undefined && growthChartEl !== null) {
    const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
    growthChart.render();
  }

  
})();
  </script>

    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?=base_url('assets');?>/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?=base_url('assets');?>/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?=base_url('assets');?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?=base_url('assets');?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?=base_url('assets');?>/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <script src="<?=base_url('assets');?>/assets/js/select2.js"></script>
    <script src="<?=base_url('assets');?>/assets/js/select2.js"></script>
    <!-- Vendors JS -->
    <script src="<?=base_url('assets');?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?=base_url('assets');?>/assets/js/main.js"></script>

    <!-- Page JS -->
    <!-- <script src="<?=base_url('assets');?>/assets/js/dashboards-analytics.js"></script> -->
    
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
    <script src="<?=base_url('assets');?>/assets/vendor/multiselect-02/js/main.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>