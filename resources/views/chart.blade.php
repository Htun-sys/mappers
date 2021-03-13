@extends("layout")
@section("content")

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

//getting unique count from division_code
var counts = {};
counts["Region"] = "Number killed by SAC";
@foreach($data as $item)
counts["{{$item->division_code}}".trim()]=1+(counts["{{$item->division_code}}".trim()] || 0);
@endforeach
var array = Object.entries(counts);
array[0].push({role: 'style'});
for (let i=1; i<array.length; i++) {
    array[i][0] = changeCodeToString(array[i][0]);
	array[i].push("color: #EE7474; opacity: 0.5; ");
}

// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {

    // Create the data table.
    var data = google.visualization.arrayToDataTable(array);

    var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

    // Set chart options
    var options = {title:'Protestors and Civilians killed by the SAC since February 1st 2021',
    	titleTextStyle: {
    		fontSize: "16",
    		bold: true
    	},
        bar: {groupWidth:	"45%"},
        backgroundColor: '#ebecf0',
        is3D: true,
        legend:'none',
    };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(view, options);
      }

function changeCodeToString(code) {
    var mappingDict = {
        "YGN":"Yangon",
        "MDY":"Mandalay",
        "SGG":"Sagaing",
        "SHN":"Shan",
        "AYY":"Ayeyawaddy",
        "BGO":"Bago",
        "NPW":"Naypyidaw",
        "TNI":"Tanintharyi",
        "MON":"Mon",
        "RKE":"Rakhine",
        "KCN":"Kachin",
        "KYH":"Kayah",
        "KYN":"Kayin",
        "MGY":"Magway",
        "CHN":"Chin"
    };
    return mappingDict[code];
}
</script>
<style type="text/css">
	div#chart_div {
		width: 100%;
		height: 100vh;
	}
</style>

<!-- <h5 class="ml-5 mr-5 mt-2">Protestors and Civilians killed by the SAC since February 1st 2021</h5> -->

<div id="chart_div"></div>

@endsection