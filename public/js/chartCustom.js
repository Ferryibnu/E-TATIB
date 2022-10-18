$(function(){
  // Data Chart Januari-Maret
  var Data1 = {
      labels  : ['Januari', 'Februari', 'Maret',],
      datasets: [
        {
          label               : 'Ringan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{$ringan_jan}}, {{$ringan_feb}}, {{$ringan_mar}}]
        },
        {
          label               : 'Sedang',
          backgroundColor     : 'rgba(210, 214, 100, 1)',
          borderColor         : 'rgba(210, 214, 100, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 100, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80]
        },
        {
          label               : 'Berat',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80]
        },
      ]
    }
    var barChartCanvas = $('#chart1').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, Data1)
    var temp0 = Data1.datasets[0]
    var temp1 = Data1.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    // Data Chart April-Juni
    var Data1 = {
        labels  : ['April', 'Mei', 'Juni'],
        datasets: [
          {
            label               : 'Ringan',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [28, 48, 40]
          },
          {
            label               : 'Sedang',
            backgroundColor     : 'rgba(210, 214, 100, 1)',
            borderColor         : 'rgba(210, 214, 100, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 100, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80]
          },
          {
            label               : 'Berat',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80]
          },
        ]
      }
      var barChartCanvas = $('#chart2').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, Data1)
      var temp0 = Data1.datasets[0]
      var temp1 = Data1.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0
  
      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }
  
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

    // Data Chart Juli-September
    var Data1 = {
        labels  : ['Juli', 'Agustus', 'September'],
        datasets: [
          {
            label               : 'Ringan',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [28, 48, 40]
          },
          {
            label               : 'Sedang',
            backgroundColor     : 'rgba(210, 214, 100, 1)',
            borderColor         : 'rgba(210, 214, 100, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 100, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80]
          },
          {
            label               : 'Berat',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80]
          },
        ]
      }
      var barChartCanvas = $('#chart3').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, Data1)
      var temp0 = Data1.datasets[0]
      var temp1 = Data1.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0
  
      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }
  
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

    // Data Chart Oktober-Desember
    var Data1 = {
        labels  : ['Oktober', 'November', 'Desember'],
        datasets: [
          {
            label               : 'Ringan',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [28, 48, 40]
          },
          {
            label               : 'Sedang',
            backgroundColor     : 'rgba(210, 214, 100, 1)',
            borderColor         : 'rgba(210, 214, 100, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 100, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80]
          },
          {
            label               : 'Berat',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80]
          },
        ]
      }
      var barChartCanvas = $('#chart4').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, Data1)
      var temp0 = Data1.datasets[0]
      var temp1 = Data1.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0
  
      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }
  
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
})