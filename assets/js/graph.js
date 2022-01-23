var backgroundColor = [
    'pink',
    'lightblue',
    'lightgreen',
    'yellow'
];
    
var borderColor = [
'red',
'blue',
'green',
'orange'
];

var label = [];
var dataChart = [];
var total = [];
var csrfValue     = $("#csrfToken").val();
var csrfName      = $("#csrfToken").attr('name');

$.ajax({
    type: "POST",
    async: false,
    dataType: 'json',
    data: {[csrfName]:csrfValue},
    url: BASE_URL + 'transactionday',
    success: function (result) {
        json = JSON.parse(result);

        $("#csrfToken").val(json[0].csrf);
              
        for(var i = 0; i<json.length;i++){

            label.push(json[i].type);
            if(json[i].total > 0){
                total.push(json[i].total);
            }else{
                total.push(undefined);
            }

        }

        console.log(total);

        const dataNewSet = {
            label: label,
            borderWidth: 1,
            data: total,
            backgroundColor: [
                'pink',
                'lightblue',
                'lightgreen',
                'yellow'
            ],
            borderColor : [
                'red',
                'blue',
                'green',
                'orange'
                ]
        };


        dataChart.push(dataNewSet);

    },
    error: function (xhr, status, error) {
        // check status && error
    },
    dataType: 'text'

  });



const data = {
  labels: label,
  datasets: dataChart
};



const config = {
    type: 'pie',
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Total Transaction Daily'
        }
      }
    },
  };


const myChart = new Chart(
    document.getElementById('dashboard-graph'),
    config
  );